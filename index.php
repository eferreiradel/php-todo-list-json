<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>

    <div id="app">
        <div class="container-fluid">
            <div class="container">
                <div class="row py-5">
                    <div class="col-5">
                        <h2>{{ message }}</h2>
                        <ul>
                             <li v-for="(item, index) in apiResponse" :key="index">
                                {{ item }}
                            </li>
                        </ul>
                        <button
                        class="btn btn-primary"
                         @click="getDataFromApi(apiURL)">Get Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- vueJs-3 -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script>
    const { createApp } = Vue;

    createApp({
      data() {
        return {
          apiURL: 'api.php',
          message: 'Hello Vue',
          apiResponse: [],
        };
      },
      methods: {
        getDataFromApi(apiURL) {
          axios.get(apiURL)
            .then(response => {
              this.apiResponse = response.data;
            })
            .catch(error => {
              console.error(error);
            });
        },
      },
      mounted() {
        this.getDataFromApi(this.apiURL);
      },
    }).mount('#app');
  </script>
</body>
</html>