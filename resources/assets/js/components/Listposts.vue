<template id="post-list">
  <div class="row">
    <div class="pull-left">
      <input v-on:keyup="getPosts" type="text" class="form-control" name="search" 
          placeholder="Cari..." v-model="search"/>
    </div>
    <div class="pull-right">
      <router-link class="btn btn-xs btn-primary" v-bind:to="{path: '/add-post'}">
        <span class="glyphicon glyphicon-plus"></span>
        Add new Post
      </router-link>
    </br></br>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Post Title</th>
          <th>Post Body</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th class="col-md-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(post, index) in filteredPosts">
          <td>{{ (posts.current_page - 1) * posts.per_page + index + 1 }}</td>
          <td>{{ post.title }}</td>
          <td>{{ post.body }}</td>
          <td>{{ post.created_at }}</td>
          <td>{{ post.updated_at }}</td>
          <td>
            <router-link class="btn btn-info btn-xs" v-bind:to="{name: 'Viewpost', params: {id: post.id}}">
                <i class="fa fa-eye" aria-hidden="true"></i> Show</router-link>
            <router-link class="btn btn-warning btn-xs" v-bind:to="{name: 'Editpost', params: {id: post.id}}">
                <i class="fa fa-pencil" aria-hidden="true"></i> Edit</router-link>
            <router-link class="btn btn-danger btn-xs" v-bind:to="{name: 'Deletepost', params: {id: post.id}}">
                <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</router-link>
          </td>
        </tr>
      </tbody>
    </table>
    <vue-pagination :data="posts" v-on:pagination-change-page="getPosts">
        <span slot="prev-nav">&lt; Previous</span>
        <span slot="next-nav">Next &gt;</span>
    </vue-pagination>
  </div>
</template>



<script>

export default {
  /*data:function(){
    return {posts: ''};
  },*/
  data: function(){
      return {
        posts: {
            current_page: 1,
            data: [],
            from: 1,
            last_page: 1,
            next_page_url: null,
            per_page: 5,
            prev_page_url: null,
            to: 1,
            total: 0,
        },
        offset: 4
      }
  },
  created: function() {
      this.getPosts(this.posts.current_page);
  },
  methods: {
    getPosts: function(page) {
        if (typeof page === 'undefined') {
            page = 1;
        }

        if(!this.search)
          this.search = '';

        Axios.get('/post/api?page=' + page + '&search=' + this.search)
        .then((response) => {
            //console.log(response.data);
            this.posts = response.data;
        })
        .catch(() => {
            console.log('handle server error from here');
        });
    }
  },  
  computed: {
    filteredPosts: function(){
      if(this.posts.data.length) {
        return this.posts.data;
      }
    }
  }
}
</script>