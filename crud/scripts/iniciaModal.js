/* Faz aparecer uma caixa de mensagem, informando o título e a mensagem
   por parâmetro */
   function iniciaModal(modalID, title, message){
    const modal = document.getElementById(modalID);
    const initialMessage = document.getElementById('initial-message');
    const initialTitle = document.getElementById('initial-title');
    if(modal){
        modal.classList.add('mostrar');
        initialMessage.innerHTML = message;
        initialTitle.innerHTML = title;
        modal.addEventListener('click', (e) => {
            if(e.target.id == "modal-messagebox" || e.target.className == "modal-btn"){
                modal.classList.remove('mostrar');
            }
        });
        document.addEventListener('keyup', (e) => {
            if(e.keyCode == 13){
                modal.classList.remove('mostrar');
            }
        });
    }
}