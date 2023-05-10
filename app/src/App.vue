<script>
import axios from 'axios'
export default {
  data() {
    return {
      urlServer: 'http://localhost:81/PHP/php-todo-list-json/server/server.php',
      url_add_element: 'http://localhost:81/PHP/php-todo-list-json/server/add_element.php',
      url_remove_element: 'http://localhost:81/PHP/php-todo-list-json/server/remove_element.php',
      url_chage_underscore_element: 'http://localhost:81/PHP/php-todo-list-json/server/chage_status_underscore_element.php',
      list: [],
      add_element: null
    }
  },
  methods: {
    /**Get element by Axios
     * 
     * @param {String} url 
     */
    get_element_by_axios(url) {

      /* effettua una chiamata Axios */
      axios
        /* la chiamata sarà di tipo GET e utilizzera la stringa passatagli come indirizzo */
        .get(url)
        /* otterrà una risposta RES */
        .then(res => {

          /* i data della rispsota sarà la lista e la inserira il list */
          this.list = res.data

        })
        /* usera il catch per eventuali errori */
        .catch(error => {

          /* se ci saranno errori li mostrerà in console */
          console.error(error.message);

        })
    },
    /**
     * 
     * @param {String} url 
     */
    add_element_by_axios(url) {

      /* definisco una costante data che sarà un ogetto */
      const data = {

        /* avrà come contenuto una 'key' e un 'value' */
        add_element: this.add_element

      }
      /* effettua una chiamata Axios */
      axios
        /* la chiamata sarà di tipo POST  */
        .post(
          /* utilizzera la stringa passatagli come indirizzo */
          url,
          /* utilizzera la costante data come dato da passare al server */
          data,
          /* utilizzerà il comando : { headers: { 'Content-Type': 'multipart/form-data' }} per far leggere la constante data come un dato di tipo form */
          {
            headers: { 'Content-Type': 'multipart/form-data' }
          })
        /* otterrà una risposta RESPONSE */
        .then(response => {

          /* i data della rispsota sarà la lista e la inserira il list */
          this.list = response.data

        })
        /* usera il catch per eventuali errori */
        .catch(error => {

          /* se ci saranno errori li mostrerà in console */
          console.error(error.message);

        })

    },
    remove_element_by_axios(url, index) {
      /* definisco una costante data che sarà un ogetto */

      const data = {

        /* avrà come contenuto una 'key' e un 'value' */
        remove_element_index: index

      }
      /* effettua una chiamata Axios */
      axios
        /* la chiamata sarà di tipo POST  */
        .post(
          /* utilizzera la stringa passatagli come indirizzo */
          url,
          /* utilizzera la costante data come dato da passare al server */
          data,
          /* utilizzerà il comando : { headers: { 'Content-Type': 'multipart/form-data' }} per far leggere la constante data come un dato di tipo form */
          {
            headers: { 'Content-Type': 'multipart/form-data' }
          })
        /* otterrà una risposta RESPONSE */
        .then(response => {

          /* i data della rispsota sarà la lista e la inserira il list */
          this.list = response.data

        })
        /* usera il catch per eventuali errori */
        .catch(error => {

          /* se ci saranno errori li mostrerà in console */
          console.error(error.message);

        })

    },
    chage_status_underscore_element_by_axios(url, index) {
      /* definisco una costante data che sarà un ogetto */
      const data = {

        /* avrà come contenuto una 'key' e un 'value' */
        status_chage_element_index: index,

      }
      /* effettua una chiamata Axios */
      axios
        /* la chiamata sarà di tipo POST  */
        .post(
          /* utilizzera la stringa passatagli come indirizzo */
          url,
          /* utilizzera la costante data come dato da passare al server */
          data,
          /* utilizzerà il comando : { headers: { 'Content-Type': 'multipart/form-data' }} per far leggere la constante data come un dato di tipo form */
          {
            headers: { 'Content-Type': 'multipart/form-data' }
          })
        /* otterrà una risposta RESPONSE */
        .then(response => {

          /* i data della rispsota sarà la lista e la inserira il list */
          this.list = response.data

        })
        /* usera il catch per eventuali errori */
        .catch(error => {

          /* se ci saranno errori li mostrerà in console */
          console.error(error.message);

        })
    }
  },
  mounted() {
    /* utilizzo la funzione all'inizio del caricamaento della pagina per ottenere indati in list */
    this.get_element_by_axios(this.urlServer)
  },

}
</script>

<template>
  <div class="container">
    <div class="row">
      <div class="col">
        <div id="app">


          <input type="text" class="form-control" name="add_element" id="add_element" rows="3" v-model='add_element'
            @keyup.enter='add_element_by_axios(url_add_element)'>

          <ul v-if="list.length > 0">
            <li class="d-flex" :class="(element.underscore === true) ? 'underscore' : ''" v-for='(element, index) in list'
              @click="chage_status_underscore_element_by_axios(url_chage_underscore_element, index)">{{ element.text }}
              <svg @click="remove_element_by_axios(url_remove_element, index)" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path
                  d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
              </svg>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
