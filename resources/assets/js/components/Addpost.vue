<template id="modal-template">
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-dialog">
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
                  <div class="form-group" align="right">
                    <button type="submit" class="btn btn-xs btn-primary" > Save </button>
                    <button class="btn btn-xs btn-primary" @click="close"> Close </button>
                  </div>
              </div>              
              
          </form>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>

export default {
  data:function(){
    return {
      post: {title: '', body: ''},
      showModal: false
    };
  },
  template: '#modal-template',
  methods:{
      createPost(){
          let uri = '/posts/';
          Axios.post(uri, this.post).then(
              (response) => { 
                  //this.$router.push({name: 'Listposts'}) 
                  this.close();
              },
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
      },
      close: function(){
          console.log(this.$parent);
          this.$parent.modalHide();
      }
  }
}
</script>

<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 300px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>