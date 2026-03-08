export function rightClickOff(){
    const rightClickToolbar = document.getElementById('right_click');
    let classSet = rightClickToolbar.classList.contains("right_click_active");

    if (classSet == true){
        rightClickToolbar.classList.remove("right_click_active");
        rightClickToolbar.classList.add("right_click");
    }
}