function validaDepto() {
  var nome = document.getElementById('nome');
  var sigla = document.getElementById('sigla');
  var erro = document.getElementById('erro');

  // primeiro limpamos todas mensagens/configurações de erro do formulario
  nome.classList.remove('crud-erro');
  sigla.classList.remove('crud-erro');
  erro.innerHTML = '';
  erro.classList.add('hidden');

  // depois iniciamos a validação
  if (nome.value == '') {
    erro.innerHTML = 'Preencha o campo nome!';

    // classList é a lista de classes do elemento, podemos remover (remove) ou adicionar (add)
    erro.classList.remove('hidden');

    nome.classList.add('crud-erro');
    nome.focus();
    return false;
  }

  if (sigla.value == '') {
    erro.innerHTML = 'Preencha o campo sigla!';

    erro.classList.remove('hidden');

    sigla.classList.add('crud-erro');
    sigla.focus();
    return false;
  }

  return true;
}
