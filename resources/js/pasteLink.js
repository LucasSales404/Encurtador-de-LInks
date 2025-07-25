const buttonPaste = document.querySelector('#buttonPaste');
const inputUrl = document.querySelector('#inputUrl');
buttonPaste.addEventListener('click', async () => {
    try{
        const text = await navigator.clipboard.readText();
        inputUrl.value = text;
    }catch(err){
        console.log(err);
    }
})
