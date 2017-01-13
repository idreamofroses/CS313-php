
function makeBigger(value) { 
    switch (value) {
        case "read":
            document.getElementById("read").style.borderWidth = "thick";
            break;
        case "home":
            document.getElementById("home").style.borderWidth = "thick";
            break;
        case "aboutme":
            document.getElementById("aboutMe").style.borderWidth = "thick";
            break;
        case "assign":
            document.getElementById("assign").style.borderWidth = "thick";
            break;
        case "contact":
            document.getElementById("contact").style.borderWidth = "thick";
            break;
        case "send":
            document.getElementById("send").style.borderWidth = "thick";
            break;
        case "download":
            document.getElementById("download").style.borderWidth = "thick";
    }
}

function makeSmaller(value) { 
    switch (value) {
        case "read":
            document.getElementById("read").style.borderWidth = "medium";
            break;
        case "home":
            document.getElementById("home").style.borderWidth = "medium";
            break;
        case "aboutme":
            document.getElementById("aboutMe").style.borderWidth = "medium";
            break;
        case "assign":
            document.getElementById("assign").style.borderWidth = "medium";
            break;
        case "contact":
            document.getElementById("contact").style.borderWidth = "medium";
            break;
         case "send":
            document.getElementById("send").style.borderWidth = "medium";
            break;
        case "download":
            document.getElementById("download").style.borderWidth = "medium";
            break;
    }
}