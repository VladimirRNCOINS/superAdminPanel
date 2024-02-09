document.addEventListener('DOMContentLoaded', function() {
    const defaultCurrentPage = 1;
    const defaultPerPage = 25;
    const defaultMaxPage = 100;
    const loc = document.location;
    const origin = loc.origin;
    const pathname = loc.pathname;
    let route = null;
    let url = null;

    const currentPage = document.querySelector('#current_page input');
    const perPage = document.querySelector('#per_page input');
    const spanLastPage = document.querySelector('#span_last_page');
    let lastPage = spanLastPage.textContent || spanLastPage.innerText;
    lastPage = parseInt(lastPage.split('из ')[1]);

    currentPage.addEventListener('keyup', function(e){
        runEnterKeyUp(e);
    });

    perPage.addEventListener('keyup', function(e){
        runEnterKeyUp(e);
    });

    function runEnterKeyUp(e){
        if (e.keyCode === 13) {
            getInputsValue();
        }
    }

    function getInputsValue(){
        if (isNaN(currentPage.value) || isNaN(parseInt(currentPage.value)) || parseInt(currentPage.value) <= 0 || parseInt(currentPage.value) > lastPage || !Number.isInteger(parseFloat(currentPage.value))){
            currentPage.value = defaultCurrentPage;
            perPage.value = defaultPerPage;
        }
        if (isNaN(perPage.value) || isNaN(parseInt(perPage.value)) || parseInt(perPage.value) <= 0 || parseInt(perPage.value) >  defaultMaxPage || !Number.isInteger(parseFloat(perPage.value))) {
            currentPage.value = defaultCurrentPage;
            perPage.value = defaultPerPage;
        }
        route = pathname.split('/')[1];
        url = origin + '/' +  route + '/' + currentPage.value + '/' + perPage.value;
        location.href = url;
    }
});