window.onload = function() {
    count();
    function count() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var countUnreadComments = this.responseText;
                if (countUnreadComments != 0) {
                    document.getElementById("counter").setAttribute("data-count", countUnreadComments); //fetching the counter value
                } else {
                    document.getElementById("counter").removeAttribute("data-count");
                }
                document.getElementById("count").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "backend/index.php?func=getCount", true);
        xhttp.send();
    }

    function createNotification() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("New notification created!");
            }
        };
        xhttp.open("POST", "backend/index.php?func=create", true);
        xhttp.send();
    }

    setInterval(function () {
        count();
    },2000);

    setInterval(function () {
        createNotification();
    }, Math.random()*4000);
};

function getNotifications() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('responsecontainer').innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "backend/index.php?func=getNotifications", true);
    xhttp.send();
}