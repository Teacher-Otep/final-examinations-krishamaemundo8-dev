
const modal = document.getElementById('custom-modal');
const modalTitle = document.getElementById('modal-title');
const modalMessage = document.getElementById('modal-message');
const modalConfirmBtn = document.getElementById('modal-confirm');
const modalCancelBtn = document.getElementById('modal-cancel');

let modalCallback = null;

function showModal(title, message, callback, isDelete = true) {
    modalTitle.innerText = title;
    modalMessage.innerText = message;
    modalCallback = callback;

    if (isDelete) {
        modalConfirmBtn.className = 'btns delbtn';
    } else {
        modalConfirmBtn.className = 'btns';
        modalConfirmBtn.style.backgroundColor = 'var(--primary-blue)';
    }

    modal.style.display = 'flex';
}

function closeModal() {
    modal.style.display = 'none';
    modalCallback = null;
}

modalConfirmBtn.onclick = function () {
    if (modalCallback) modalCallback();
    closeModal();
};

modalCancelBtn.onclick = closeModal;

window.onclick = function (event) {
    if (event.target == modal) closeModal();
};

function clearFields() {
    document.querySelectorAll('input[type="text"], input[type="number"]').forEach(f => f.value = '');
}

function customAlert(message) {
    showModal('Attention', message, null, false);
    modalConfirmBtn.innerText = 'OK';
    modalCancelBtn.style.display = 'none';
    modalConfirmBtn.onclick = function () {
        closeModal();
        modalCancelBtn.style.display = 'inline-block';
        modalConfirmBtn.innerText = 'Confirm';
    };
}

function validateSearch() {
    let id = document.getElementById('edit_id').value;
    if (!id || id <= 0) {
        customAlert("Please enter a valid Student ID to search.");
        return false;
    }
    return true;
}

function handleFormDelete(event) {
    event.preventDefault();
    const form = event.target;
    let id = document.getElementById('del_id').value;

    if (!id || id <= 0) {
        customAlert("Please enter a valid Student ID to delete.");
        return;
    }

    showModal('Confirm Deletion', `Are you sure you want to permanently delete student ID ${id}?`, () => {
        form.submit();
    });
}

function deleteDirectly(event, id) {
    event.preventDefault();
    showModal('Confirm Deletion', `Are you sure you want to permanently delete student record #${id}?`, () => {
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = 'includes/delete.php';
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'id';
        input.value = id;
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    });
}

function handleUpdate(event) {
    event.preventDefault();
    const form = event.target;
    showModal('Confirm Update', 'Are you sure you want to save these changes to the student record?', () => {
        form.submit();
    }, false);
}
