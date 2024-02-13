document.addEventListener('DOMContentLoaded', function() {
    const body = document.querySelector('body');
    const usersSearchBlock = document.querySelector('#users_search_block');
    const search = document.querySelector('input[name="user_search"]');
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const wrapSearchUsersResult = document.querySelector('#wrap_search_users_result');

    body.addEventListener('click', function () {
        wrapSearchUsersResult.innerHTML = '';
    });

    search.addEventListener('input', function () {
        wrapSearchUsersResult.innerHTML = '';
        if (search.value == '') {
            return;
        }
        fetch("/user_search", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": csrf,
            },
            body: JSON.stringify({
                name: search.value,
            })
        })
        .then(response => {
            return response.json();
        })
        .then((data) => {
            if (data && data.names && data.names.length) {
                const ulView = document.createElement('ul');
                ulView.classList.add('ul_user_searh');

                for ( let i=0; i < data.names.length; i++) {
                    const aViewItem = document.createElement('a');
                    aViewItem.setAttribute('href', '/edit_user/' + data.names[i].id);
                    aViewItem.classList.add('a_user_search');
                    const listViewItem = document.createElement('li');
                    listViewItem.classList.add('li_user_search');
                    listViewItem.appendChild(document.createTextNode(data.names[i].name));
                    aViewItem.appendChild(listViewItem);
                    ulView.appendChild(aViewItem);
                }
                
                wrapSearchUsersResult.appendChild(ulView);
                usersSearchBlock.appendChild(wrapSearchUsersResult);
            }
        })
        .catch((error) => {
            console.log(error);
        });
    });
});