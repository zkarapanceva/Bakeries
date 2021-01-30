@extends('base')

@section('content')
<img src="images/Logo2.png" alt="">
<div class="search-container">
    <form action="">
        <input type="text" id="search-input" placeholder="Search by city" name="search">
        <button id="submit-btn"><i class="fa fa-search"></i></button>
        </input>
    </form>
</div>

<div id="results">

</div>
@endsection

@push('scripts')
<script>
    document.getElementById('search-input').addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            loadResults()
        }
    });

    document.getElementById("submit-btn").addEventListener("click", function(event){
        event.preventDefault()
        loadResults()
    });

    function loadResults() {
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
@endpush
