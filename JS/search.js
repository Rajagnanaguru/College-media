$(document).ready(function () {
    const searchBar = $(".search-bar input");
    const search_list = $(".users-list");
    //console.log('hi');
    searchBar.keyup(function () {
        let searchTerm = searchBar.val();
        console.log(searchTerm);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "../backend/search.php", true);
        xhr.onload = () => {
            let msg = "No results found";
            let data = xhr.response;
            search_list.html(data);
            //console.log(data);
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm);
    });
});