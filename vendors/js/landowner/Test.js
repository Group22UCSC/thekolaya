
const openModalButtons = document.querySelectorAll('[data-modal-target]')
const closeModalButtons = document.querySelectorAll('[data-close-button]')
const overlay = document.getElementById('overlay')

openModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = document.querySelector(button.dataset.modalTarget)
    openModal(modal);
    getPrice();
    reqType();
  })
})

overlay.addEventListener('click', () => {
  const modals = document.querySelectorAll('.modal.active')
  modals.forEach(modal => {
    closeModal(modal)
  })
})

closeModalButtons.forEach(button => {
  button.addEventListener('click', () => {
    const modal = button.closest('.modal')
    closeModal(modal)
  })
})

function openModal(modal) {
  
  if (modal == null) return
  modal.classList.add('active')
  overlay.classList.add('active')
  
}

function closeModal(modal) {
  if (modal == null) return
  modal.classList.remove('active')
  overlay.classList.remove('active')
}

function getPrice(){
  var price=document.getElementById('priceid').value;
  document.getElementById('priceInput').value=price;
}
function reqType(){
  var price=document.getElementById('RequestType').value;
  document.getElementById('rtype').value=price;
}
