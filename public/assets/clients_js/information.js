function fitText(el) {
    el.style.fontSize = '310%';
    el.style.transform = 'scaleX(1)';

    const parentWidth = el.parentElement.offsetWidth;
    const textWidth = el.scrollWidth;

    const scale = parentWidth / textWidth;
    el.style.transform = `scaleX(${Math.min(1, scale)})`;
}

document.querySelectorAll('.surname').forEach(fitText);
document.querySelectorAll('.name').forEach(fitText);