export function stopResize(){
    this.isResizing = false;
    this.resizer = null;

    document.removeEventListener('mousemove', this.handleMouseMove);
    document.removeEventListener('mouseup', this.stopResize);
    console.log('mouse event listeners were deleted');
}