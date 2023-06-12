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
<body class="bg-light">

    <div id="app">
        <div class="container-fluid">
            <div class="container">
                <div class="row py-5 justify-content-center">
                    <div class="col-5 card border px-0 rounded-top-3">
                        <div class="card-header bg-primary rounded-top-3 text-white">
                            <h4 class="py-2">{{ header }}</h4>
                        </div>
                        <div class="container px-0 py-5  pb-5">
                            <ul class="list-group">
                                 <li class="list-group-item list-group-item-action" v-for="(item, index) in apiResponse" :key="index">
                                    {{ item }}
                                </li>
                            </ul>
                        </div>
                        <div class="container pb-5">
                            <button
                            class="btn btn-primary"
                             @click="getDataFromApi(apiURL)">Get Data</button>
                        </div>
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
          header: 'List from API',
          apiResponse: [],
        };
      },
      methods: {
        getDataFromApi() {
          axios.get(this.apiURL)
            .then(response => {
              this.apiResponse = response.data;
            })
            .catch(error => {
              console.error(error);
            });
        },
      },
      
    }).mount('#app');
  </script>
</body>
</html>