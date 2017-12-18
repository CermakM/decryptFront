window.onload = function () {

//Better to construct options first and then pass it as a parameter
    var options = {
        animationEnabled: true,
        title: {
            text: "Frequency of letters",
            fontColor: "Peru"
        },
        axisY: {
            tickThickness: 0,
            lineThickness: 0,
            valueFormatString: " ",
            gridThickness: 0
        },
        axisX: {
            tickThickness: 0,
            lineThickness: 0,
            labelFontSize: 18,
            labelFontColor: "Peru"
        },
        data: [{
            indexLabelFontSize: 26,
            toolTipContent: "<span style=\"color:#62C9C3\">{indexLabel}:</span> <span style=\"color:#CD853F\"><strong>{y}</strong></span>",
            indexLabelPlacement: "inside",
            indexLabelFontColor: "white",
            indexLabelFontWeight: 600,
            indexLabelFontFamily: "Verdana",
            color: "#5768c0",
            type: "bar",
            dataPoints: [
                {y: 71, label: "71%", indexLabel: "A"},
                {y: 25, label: "25%", indexLabel: "B"},
                {y: 33, label: "33%", indexLabel: "C"},
                {y: 36, label: "36%", indexLabel: "D"},
                {y: 42, label: "42%", indexLabel: "E"},
                {y: 49, label: "49%", indexLabel: "F"},
                {y: 50, label: "50%", indexLabel: "G"},
                {y: 55, label: "55%", indexLabel: "H"},
                {y: 61, label: "61%", indexLabel: "I"}
            ]
        }]
    };

    $("#chartContainer").CanvasJSChart(options);
}
