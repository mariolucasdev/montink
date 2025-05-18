function toastConfig(message, color) {
    return {
        text: message,
        duration: 3000,
        newWindow: true,
        close: true,
        gravity: "bottom",
        position: "right",
        stopOnFocus: true,
        style: {
            color: "white",
            background: color,
        },
        onClick: function () {}
    }
}

function toastError(message) {
    var config = toastConfig(message, '#dc3545')
    Toastify(config).showToast();
}

function toastSuccess(message) {
    var config = toastConfig(message, '#35DB65')
    Toastify(config).showToast();
}