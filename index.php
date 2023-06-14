<?php

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Todo App</title>
  <link rel="stylesheet" href="./style.css">
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<div id="app">
  <div class="container-fluid">
    <div class="container">
      <div class="row justify-content-center py-5">
        <div class="col-5">
          <div class="card">
            <div class="card-header bg-primary text-white">
              TODO
            </div>
            <div class="card-body px-0">
              <ul class="list-group">
                <li class="list-group-item" v-for="item in test" :key="item">{{ item }}</li>
              </ul>
            </div>
            <div class="card-footer">
              <div class="input-group">
                <input type="text" class="form-control" v-model="noteCommit">
                <button type="button" class="btn btn-primary" @click="pushDataToEndPoint">
                  ADD NOTE
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const app = new Vue({
    data: {
      test: [],
      noteCommit: "",
      apiURL: 'api.php'
    },
    methods: {
      pushDataToEndPoint() {
        axios.post(this.apiURL, {
            note: this.noteCommit
          })
          .then(response => {
            this.test.push(this.noteCommit);
            this.noteCommit = "";
          })
          .catch(error => {
            console.error(error);
          });
      },
      getDataFromApi() {
        axios.get(this.apiURL)
          .then(response => {
            this.test = response.data;
          })
          .catch(error => {
            console.error(error);
          });
      }
    },
    mounted() {
      this.getDataFromApi();
    }
  });

  app.$mount("#app");
</script>

</body>
</html>


