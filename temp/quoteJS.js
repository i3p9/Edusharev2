var quotes = ["Eat everyday - Me", 
"Sleep is needed - Also me", 
"Holy shit - Me", 
"Always give up if you can not solve stuff - Also me", 
"I like you - ME"
];

function newQuote(){
var random = Math.floor(Math.random() * (quotes.length));
document.getElementById('randomQuote').innerHTML = quotes[random];
}

function toBlue(){
    document.getElementById("container").className = "blue"
}
function toYellow(){
    document.getElementById("container").className = "yellow"
}
function toGreen(){
    document.getElementById("container").className = "green"
}
function toOrange(){
    document.getElementById("container").className = "orange"
}