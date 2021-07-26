function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var dy = today.getDay();
    var dd = today.getDate();
    var mm = today.getMonth();
    var yy = today.getFullYear();
    m = checkTime(m);
    s = checkTime(s);
    var mon = getDayMonth('month',mm);
    var day = getDayMonth('day',dy)
    
    document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
    document.getElementById('date').innerHTML = day + ", " + dd + " " + mon + " " + yy;
    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

function getDayMonth(cond,value){
    if(cond == 'day'){
        switch (value) {
          case 0:
            return "Minggu";
            break;
          case 1:
            return "Senin";
             break;
          case 2:
            return "Selasa";
            break;
          case 3:
            return "Rabu";
            break;
          case 4:
            return "Kamis";
            break;
          case 5:
            return "Jumat";
            break;
          case  6:
            return "Sabtu";
            break;
          default:
            return "False";
        }
    }
    else if(cond == 'month'){
        switch (value) {
            case 0:
              return "Januari";
              break;
            case 1:
              return "Februari";
               break;
            case 2:
              return "Maret";
              break;
            case 3:
              return "April";
              break;
            case 4:
              return "Mei";
              break;
            case 5:
              return "Juni";
              break;
            case 6:
              return "Juli";
              break;
            case 7:
              return "Agustus";
              break;
            case 8:
              return "September";
              break;
            case 9:
              return "Oktober";
              break;
            case 10:
              return "November";
              break;
            case 11:
              return "Desember";
              break;
            default:
              return "False";
          }
    }
    else
    {return "False";}
}