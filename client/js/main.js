var g_members = [
    {
        name: "Usaman",
        designation: "Sales Executive"
    },
    {
        name: "Arif",
        designation: "Sales Executive"
    },
    {
        name: "Tauseef",
        designation: "Sales Executive"
    },
    {
        name: "Nazoo",
        designation: "Web Developer"
    },
    {
        name: "Usaman",
        designation: "Sales Executive"
    },
    {
        name: "Arif",
        designation: "Sales Executive"
    },
    {
        name: "Tauseef",
        designation: "Sales Executive"
    },
    {
        name: "Nazoo",
        designation: "Web Developer"
    }
];

/*
 function DisplayMembers() {
 var html = "<table><tr><th>Name</th><th>Designation</th></tr>";
 for (var i = 0; i < members.length; i++) {
 html += "<tr>";
 html += "<td>" + members[i].name + "</td>";
 html += "<td>" + members[i].designation + "</td>";
 html += "</tr>";
 
 }
 
 html += "</table>";
 document.getElementById('output').innerHTML = html;
 
 }
 */

function LoadMembers() {
    $.ajax({
        method: "get",
        url: 'http://localhost/labs/projects/eis-team-module/server/eis-team-controller.php?msg_id=1',
        success: function (data) {
//            alert("Ureka!!!");
            console.log(data);
            if (data != undefined) {
                DisplayMembers(JSON.parse(data));
            }
        },
        error: function (data) {
            alert("Gadbad");
        }
    });
}

function DisplayMembers(members) {
    var html = "<div class='eis-team-container'>";
    if(members == undefined){
        return;
    }
    for (var i = 0; i < members.length; i++) {
        if (members[i].img_url == undefined) {
            html += "<div class='eis-team-profile'> <img src= '" + "img/default.png" + "'>";
        } else {
            html += "<div class='eis-team-profile'> <img src= '" + members[i].img_url + "'>";
        }


        html += "<h2>" + members[i].name + "</h2>";
        html += "<p>" + members[i].designation + "</p>";
        html += "</div>";
    }

    html += "</div>";
    document.getElementById('output').innerHTML = html;

}
