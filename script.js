// Initialize searchable select fields
document.addEventListener('DOMContentLoaded', function() {
    const delIdSelect = document.getElementById('del_id');
    const editIdSelect = document.getElementById('edit_id');
    const readSearchSelect = document.getElementById('read_search_id');
    
    if (delIdSelect) {
        const delChoices = new Choices(delIdSelect, {
            searchEnabled: true,
            searchPlaceholderValue: 'Search students...',
            removeItemButton: false,
            shouldSort: false,
            renderChoiceLimit: -1
        });
    }
    
    if (editIdSelect) {
        // Remove the inline onchange handler to prevent conflicts
        editIdSelect.removeAttribute('onchange');
        
        const editChoices = new Choices(editIdSelect, {
            searchEnabled: true,
            searchPlaceholderValue: 'Search students...',
            removeItemButton: false,
            shouldSort: false,
            renderChoiceLimit: -1
        });
        
        // Handle change event for form submission
        editIdSelect.addEventListener('change', function() {
            if (this.value) {
                this.form.submit();
            }
        });
    }
    
    if (readSearchSelect) {
        const readChoices = new Choices(readSearchSelect, {
            searchEnabled: true,
            searchPlaceholderValue: 'Search students...',
            removeItemButton: false,
            shouldSort: false,
            renderChoiceLimit: -1
        });
        
        // Handle change event to filter table
        readSearchSelect.addEventListener('change', function() {
            filterStudentTable(this.value);
        });
    }
});

// Filter student table based on selected ID
function filterStudentTable(selectedId) {
    const rows = document.querySelectorAll('.student-row');
    
    if (!selectedId) {
        // Show all rows if no selection
        rows.forEach(row => {
            row.style.display = '';
        });
    } else {
        // Hide/show rows based on ID match
        rows.forEach(row => {
            const rowId = row.getAttribute('data-id');
            row.style.display = rowId === selectedId ? '' : 'none';
        });
    }
}

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
