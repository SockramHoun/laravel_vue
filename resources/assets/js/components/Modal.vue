
<template id="add-post"> 
    <div class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <!-- modal content data -->
            <div class="modal-content modal-content-data">
                <form v-on:submit.prevent = "createPost">
                    <div class="modal-body">
                        <div class="form-group">
                          <label for="add-title">Title</label>
                          <input id="add-title" v-model="post.title" class="form-control" required />
                        </div>
                        <div class="form-group">
                          <label for="add-body">Body</label>
                          <textarea class="form-control" rows="10" v-model="post.body"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-xs btn-primary" @click="add">
                        Create Post</button>
                </form>
            </div>
            <!-- modal content success -->
            <div class="modal-content modal-content-success" style="display: none">
                <div class="modal-body">
                    Success!
                </div>
            </div>
            <!-- modal content failed -->
            <div class="modal-content modal-content-failed" style="display: none">
                <div class="modal-body">
                   Fail!
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
  data: function () {
    return {post: {title: '', body: ''}}
  },
  //template: '#add-post',
  //template: 'Hello World!',
  methods:{
      add(event){
          let uri = '/posts/';
          Axios.post(uri, this.post).then(
              (response) => { this.$router.push({name: 'Listposts'}) },
              (error) => { console.log(error) }
          );
          /*const data = {
             
          }
          this.$store.dispatch('add', data)
          .then((response) => {
              if(response == true) 
                  this.$parent.$options.methods.modalContent('#modal-data', '.modal-content-success')
              else              
                  this.$parent.$options.methods.modalContent('#modal-data', '.modal-content-failed')
          })
          .catch(error => {
              console.log('error')
          });*/
      }
  }
  /*methods: {
    createPost: function() {
        let uri = '/posts/';
        Axios.post(uri, this.post).then(
            (response) => { this.$router.push({name: 'Listposts'}) },
            (error) => { console.log(error) }
        );
    }
  }*/
}
</script>
