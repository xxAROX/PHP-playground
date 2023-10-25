const TOAST_ICONS = {
    Warning: "warning",
    Error: "error",
    Success: "success",
    Info: "info",
    Question: "question",
};
const TOAST_DEFAULT_OPTIONS = {
    title: undefined,
    icon: undefined,
    timer: 5000,
};

function showToast(options) {
    options = {...TOAST_DEFAULT_OPTIONS, ...options};
    if (!options.confirmButtonText) options.showConfirmButton = false;

    Swal.fire({
        ...options,
        toast: true,
        position: "bottom-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        }
    });
}