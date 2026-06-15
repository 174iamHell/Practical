/**
 * 
 * @param {Function} callback 
 */
function logger(name, callback) {
    let counter = 0;
    return () => {
        callback();
        counter++;
        console.log(`Function ${name} is called ${counter} times`)
    };
}

const test = logger('test', () => {
    console.log('running!!!')
})

test();
test();
test();
test();
test();

const test2 = logger('test2', () => {
    console.log('not running!!!')
})

