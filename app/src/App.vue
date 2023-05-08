<script>
import axios from 'axios'
export default {
  data() {
    return {
      urlServer: 'http://localhost:81/PHP/php-todo-list-json/server/server.php',
      list: [],
      add_element: null
    }
  },
  methods: {
    get_element_by_axios(url) {
      axios.get(url)
        .then(res => {
          
          this.list = res.data
        })
        .catch(error => {
          console.error(error.message);
        })
    },
    add_element_by_axios(url) {
    
      const data = {
        add_element: this.add_element
            }
      axios.post(url, data,
        {
          headers: { 'Content-Type': 'multipart/form-data' }
        })
        .then(response =>{
          
          this.list = response.data
          console.log(response);
        })
        .catch(error => {
          console.error(error.message);
        })
        
    }
  },
  mounted() {
    this.get_element_by_axios(this.urlServer)
  },

}
</script>

<template>
  <div class="container">
        <div class="row">
            <div class="col">
                <div id="app">
                    <div class="mb-3">
                        
                            <input type="text" class="form-control" name="add_element" id="add_element" rows="3" v-model='add_element' @keyup.enter='add_element_by_axios(urlServer)'>
                        
                        <ul v-if="list.length > 0">
                            <li v-for='element in list'>{{element}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
</style>
