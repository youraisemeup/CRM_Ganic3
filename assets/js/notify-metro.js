$.notify.addStyle("metro", {
    html:
        "<div>" +
            "<div class='text-wrapper'>" +
                "<div class='icon' data-notify-html='icon'/>" +
                "<div class='title' data-notify-html='title'/>" +
                "<div class='text' data-notify-html='text'/>" +
            "</div>" +
        "</div>",
    classes: {
        error: {
            "color": "#a94442",
            "background-color": "#f2dede",
            "border": "1px solid #ebccd1"
        },
        success: {
            "color": "#3c763d",
            "background-color": "#dff0d8",
            "border": "1px solid #d6e9c6"
        },
        info: {
            "color": "#31708f",
            "background-color": "#d9edf7",
            "border": "1px solid #bce8f1"
        },
        warning: {
            "color": "#8a6d3b",
            "background-color": "#fcf8e3",
            "border": "1px solid #faebcc"
        },
        black: {
            "color": "#fff",
            "background-color": "#999",
            "border": "1px solid #ccc"
        },
        white: {
            "color": "#000",
            "background-color": "#fff",
            "border": "1px solid #ddd"
        }
    }
});
