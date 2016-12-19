<html>
<head>

    <title>

    </title>
</head>
<body>

<div id="root">
    <input type="text" id="input" v-model="message">

    <p>The value of the input is @{{ message }}</p>

    <ul>
        <li v-for="name in names" v-text="name"></li>
    </ul>
    <input id="input" type="text" name="name">
    <button>Add name</button>

</div>

<script src="https://unpkg.com/vue@2.1.6/dist/vue.js"></script>

<script>

    //document.querySelector('#input').value = data.message;

    var app = new Vue({

        el: '#root',

        data: {
            message: 'Hello',
            'names': ['kiki', 'miki', 'riki']
        }
    });


</script>

</body>
</html>