

var intime, outtime, ip, country, countrycode, city, isp, province, link_id;

$(document).ready(function () {
    $.getJSON('https://api.ipdata.co/?api-key=dbc225ea3dbabbca241a7c1b895b06fbaa4e0af47fa062b144c6b649', function (data) {
        ip = data.ip;
        country = data.country_name;
        countrycode = data.country_code;
        city = data.city;
        isp = data.organisation;
        province = data.region;
    });
});





function get_intime() {
    var d = new Date();
    var year = d.getFullYear();
    var month = d.getUTCMonth() + 1;
    var day = d.getDate();
    var hh = d.getHours();
    var mins = d.getMinutes();
    var ss = d.getSeconds();
    var rec = year + "-" + month + "-" + day + " " + hh + ":" + mins + ":" + ss;
    intime = rec;
}



function redirect(clicked_id) {
    link_id = clicked_id;
    get_intime();
    console.log(link_id + " " + intime + " " + country + " " + countrycode + " " + ip + " " + city + " " + province + " " + isp);
    direct(clicked_id);
    $.ajax({
        method: "POST",
        url: "data.php",
        data: { Link_id: link_id, Time: intime, IP: ip, Country: country, City: city, ISP: isp, Province: province },
        success: function (status) {
          // alert("Success");
        }

    })
    
}


function direct(link){

    if(link=="LINK01"){
        window.open('http://bit.ly/Ebates_REF', '_new');
    }else if(link=="LINK02"){
        window.open('http://bit.ly/IQ_Trade','_new');
    }else if(link=="LINK03"){
        window.open('http://bit.ly/2RT2XS3','_new');
    }else if(link=="LINK04"){
        window.open('http://bit.ly/Reg_Fiverr','_new');
    }
}
// window.onload = get_ip_info();
//window.onbeforeunload = get_outime();

//Mon Feb 11 2019 09:27:00 GMT+0530 (India Standard Time)

// YYYY-MM-DD HH:MI:SS