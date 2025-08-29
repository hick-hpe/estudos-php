const atualizarTarefaModal = document.getElementById('atualizarTarefa');
atualizarTarefaModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const nome = button.getAttribute('data-nome');

    // Preencher os campos do modal
    atualizarTarefaModal.querySelector('#tarefaId').value = id;
    atualizarTarefaModal.querySelector('#novoNome').value = nome;
});

const excluirTarefaModal = document.getElementById('excluirTarefa');
excluirTarefaModal.addEventListener('show.bs.modal', event => {
    const button = event.relatedTarget;
    const id = button.getAttribute('data-id');
    const nome = button.getAttribute('data-nome');

    console.log('Excluir: ' + nome);

    // Preencher os campos do modal
    excluirTarefaModal.querySelector('#tarefaId').value = id;
    excluirTarefaModal.querySelector('#nomeTarefa').textContent = nome;
});

const inputPesquisa = document.querySelector('#inputPesquisa');
const tbody = document.querySelector('tbody');
inputPesquisa.addEventListener('input', (e) => {
    const tarefa = inputPesquisa.value.toLocaleLowerCase().trim();

    for (let i = 0; i < tbody.childElementCount; i++) {
        const tr = tbody.children.item(i);
        const texto = tr.children.item(1).textContent.toLocaleLowerCase();
        if (texto.includes(tarefa)) {
            tr.style.display = '';
        } else {
            tr.style.display = 'none';
        }
    }
});


