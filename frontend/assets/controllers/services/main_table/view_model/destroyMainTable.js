export function destroyMainTable(frame) {
    if (frame) {
        frame.innerHTML = "";
    }

    console.log("MainTable destroyed");
};