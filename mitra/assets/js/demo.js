var rangeText = function (start, end) {
    var str = '';
    str += start ? start.format('DD') + ' to ' : '';
    str += end ? end.format('DD') : '...';

    return str;
},
css = function(url){
    var head  = document.getElementsByTagName('head')[0];
    var link  = document.createElement('link');
    link.rel  = 'stylesheet';
    link.type = 'text/css';
    link.href = url;
    head.appendChild(link);
},
script = function (url) {
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var head  = document.getElementsByTagName('head')[0];
    head.appendChild(s);
}

window.onload = function () {
var gists = 'https://gist.github.com/wakirin/d4f00465b259590233f0727f01eaba66.json?callback=callbackJson';

if (!window.location.href.startsWith('file')) {
    gists.forEach(function(entry, key){
        script(entry);
    });
}};

var today = new Date();
var dd = today.getDate();

new Lightpick({
    field: document.getElementById('demo-2_1'),
    secondField: document.getElementById('demo-2_2'),
    inline: true,
    singleDate: false,
    numberOfMonths: 1,
    selectForward: true,
    minDate: moment().startOf('month').add(dd-1,'day'),
    minDays: 2,
    onSelect: function(start, end){
        document.getElementById('result-2').innerHTML = rangeText(start, end);
    }
});