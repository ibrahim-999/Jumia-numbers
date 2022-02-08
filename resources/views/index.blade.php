<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container mt-2">
        <div id="app">
            <div class="row">
                <div class="col">
                    <h1>Phone numbers</h1>
                </div>
                <div class="col">
                    <h1>Total: @{{customers.length}}</h1>
                </div>
            </div>

            <div class="mt-5 row">
                <div class="col">

                    <select class="custom-select" v-model="country" @change="filter()">
                        <option value="none" selected>Select Country</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Uganda">Uganda</option>
                    </select>
                </div>

                <div class="col">
                    <select class="custom-select" v-model="state" @change="filter()">
                        <option value="none" selected>Vlidate Phone number</option>
                        <option value="1">Valid</option>
                        <option value="0">Not valid</option>
                    </select>
                </div>

                <table class="table mt-5" v-if="customers">
                    <thead>
                        <tr>
                            <th scope="col">Country</th>
                            <th scope="col">State</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone num.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="customer in customers">
                            <td>@{{customer.country}}</td>
                            <td>@{{customer.state ? "OK" : "NOK"}}</td>
                            <td>@{{customer.name}}</td>
                            <td>@{{customer.phone}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.7/vue.min.js"></script>
<script>
    Vue.config.devtools = true
    var vm = new Vue({
        el: '#app',
        data: {
            country: "none",
            state: "none",
            url: '{{url("api/customers?")}}',
            customers: []
        },
        methods: {
            index() {
                fetch(this.url).then(response => response.json()).then(data => (this.customers = data));
            },
            filter() {
                let countryParam = (this.country !== "none") ? `country=${this.country}&` : '';
                let stateParam = (this.state !== "none") ? `state=${this.state}` : '';
                fetch(this.url + countryParam + stateParam).then(response => response.json()).then(data => (this
                    .customers = data));
            }
        },
        created() {
            this.index();
        }
    });
</script>

</html>