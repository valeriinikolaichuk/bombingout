export function return_DataType(ths){
    ths.forEach(th => {
        if (th.dataset.type.startsWith('number')){
            th.dataset.type = 'number';
        } else if (th.dataset.type.startsWith('string')){
            th.dataset.type = 'string';
        } else if (th.dataset.type.startsWith('checkbox')){
            th.dataset.type = 'checkbox';
        }
    });
}