document.addEventListener('DOMContentLoaded', function() {
    const defaultCurrentPage = 1;
    const defaultPerPage = 25;
    const defaultMaxPage = 100;
    const loc = document.location;
    const origin = loc.origin;
    const pathname = loc.pathname;
    let route = null;
    let url = null;

    //управление Inputs после нажатия кнопки Enter
    const currentPage = document.querySelector('#current_page input');
    const perPage = document.querySelector('#per_page input');
    const spanLastPage = document.querySelector('#span_last_page');
    let lastPage = spanLastPage.textContent || spanLastPage.innerText;
    lastPage = parseInt(lastPage.split('из ')[1]);

    //управлене кнопками пагинатора после события Click
    const fastRewind = document.getElementById('fast_rewind');
    const fastForward = document.getElementById('fast_forward');
    const refresh = document.getElementById('refresh');
    const arrow_left = document.getElementById('arrow_left');
    const arrow_right = document.getElementById('arrow_right');

    if (parseInt(currentPage.value) <= 1) {
        fastRewind.classList.add("disabled_div_paginator");
        arrow_left.classList.add("disabled_div_paginator");
    }
    
    if (parseInt(currentPage.value) >= lastPage) {
        fastForward.classList.add("disabled_div_paginator");
        arrow_right.classList.add("disabled_div_paginator");
    }  

    //all EventsListeners
    arrow_left.addEventListener('click', function() {
        currentPage.value = +currentPage.value - 1;
        getInputsValue();
    });

    arrow_right.addEventListener('click', function() {
        currentPage.value = +currentPage.value + 1;
        getInputsValue();
    });

    fastRewind.addEventListener('click', function() {
        currentPage.value = 1;
        getInputsValue();
    });

    fastForward.addEventListener('click', function() {
        currentPage.value = lastPage;
        getInputsValue();
    });

    refresh.addEventListener('click', function() {
        currentPage.value = 1;
        perPage.value = 25;
        getInputsValue();
    });

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

    //валидация и вызов меодом GET пагинированные данные 
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