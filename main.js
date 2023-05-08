/* const { createApp } = Vue;
const app = createApp({
  data() {
    return {
      urlServer: 'server.php',
      list: '',
      add_element: ''
    }
  },
  methods: {
   get_element_by_axios(url){
    axios.get(url)
      .then(res => {
        const posts = res.data;
        console.log(posts);
        this.list = res.data
      })
      .catch(error =>{
        console.error(error.message);
      })
   },
   add_element_by_axios(url,data){
    axios.post(url,data,
      {
        headers: {'Content-Type': 'multipart/form-data'}
      })
      .catch(error =>{
        console.error(error.message);
      })
   }
    },
    mounted() {
     this.get_element_by_axios(this.urlServer)
},
  
})

app.mount('#app') */