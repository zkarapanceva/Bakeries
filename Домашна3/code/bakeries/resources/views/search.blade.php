<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bakeries</title>

        <link rel="stylesheet" href="css/Search.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <div class="wrapper">
        <div class="nav">
            <div class="logo"><img class="imglogo"src="images/Logo1.png" alt="img"></div>
            <div class="menu">
                <ul>
                    <li><a href="/help">HELP</a></li>
                    <li><a href="/">HOME</a></li>
                </ul>
            </div>
        </div>
        <div class="header">
            <img src="images/Logo2.png" alt="">
            <div class="search-container">
                <form action="/action_page.php">

                    <input type="text" id="search-input" placeholder="Search bakeries database..." name="search">
                    <button id="submit-btn"><i class="fa fa-search"></i></button>
                    </input>

                </form>
            </div>

            <div id="results">

            </div>
        </div>
    </div>
    </body>
</html>

<script>
    document.getElementById('search-input').addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            test()
        }
    });

    document.getElementById("submit-btn").addEventListener("click", function(event){
        event.preventDefault()
        test()
    });

    function test() {
        let search = document.getElementById('search-input').value

        if (search.length === 0) {
            return
        }

        fetch('/search/' + search)
        .then(response => response.json())
        .then(data => {
            let container = document.getElementById('results')
            container.innerHTML = '';
            if(!data.length) {
                let el = document.createElement('div')
                el.className='no-results-element'
                el.innerHTML='No results'
                container.appendChild(el)
                return
            }
            data.forEach((item, index) => {
                let el = document.createElement('div')
                el.className='result-element'
                el.innerHTML = (index+1) + ': ' + item.name + ' - ' + item.addr_city + ': ул.' + item.addr_street
                container.appendChild(el)
            })
        })
    }
</script>
