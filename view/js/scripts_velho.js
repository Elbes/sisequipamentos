var
        myVar = setInterval(function () {

            myTimer();
        }, 1000);

function myTimer()

{
    var d = new Date();

    var t = d.toLocaleTimeString();

    document.getElementById("demo").innerHTML = t;
}

function  cadastroDemanda() {
    swal({title: 'Muito Bem..!', type: 'success', text: 'Demanda Cadastrada com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
//        window.history.go(-1);
        window.location.href = '../view/listar_demanda.php';
    });
    event.preventDefault();
}
;

function cadastroUsuario() {
    swal({title: 'Muito Bem..!', type: 'success', text: 'Usuário Cadastrado com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.location.href = '../../view/usuario/listaUsuario.php';
    });

    event.preventDefault();
}
;

function  cadastroLoja() {
    swal({title: 'Muito Bem..!', type: 'success', text: 'Loja Cadastrada com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
//        window.history.go(-1);
        window.location.href = '../view/cadastrar_loja.php';
    });
    event.preventDefault();
}
;

function  statusDemanda() {
    swal({title: 'Oops...!', type: 'warning', text: 'Por Favor, altere o Status da Demanda!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-1);
    });
    event.preventDefault();
}
;

function  statusUsuario() {
    swal({title: 'Oops...!', type: 'warning', text: 'Por Favor, altere o Status do Usuário!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-1);
    });
    event.preventDefault();
}
;

function  edicaoDemanda() {
    swal({title: 'Muito Bem..!', type: 'success', text: 'Demanda Editada com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.location.href = '../view/listar_demanda.php';
    });
    event.preventDefault();
}
;

function  edicaoUsuario() {
    swal({title: 'Muito Bem..!', type: 'success', text: 'Usuário Editado com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-2);
    });
    event.preventDefault();
}
;

function  edicaoLoja() {
    swal({title: 'Muito Bem..!', type: 'success', text: 'Loja Editada com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-2);
    });
    event.preventDefault();
}
;

function  validalogin() {
    swal({title: 'Oops...!', type: 'warning', text: 'Você não está autorizado a utilizar o sistema!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.location.href = 'logout.php';
    });
    event.preventDefault();
}
;


function  erroCadastrarUsuario() {
    swal({title: 'Oops...!', type: 'error', text: 'Erro ao cadastrar Usuário!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-1);
    });
    event.preventDefault();
}
;

function  senhaInvalida() {
    swal({title: 'Oops...!', type: 'error', text: 'Você Digitou a senha Inválida!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.location.href = '../index.php';
    });
    event.preventDefault();
}
;

function  ErroEditarLoja() {
    swal({title: 'Oops...!', type: 'error', text: 'Ocorreu um erro ao Editar Loja!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-1);
    });
    event.preventDefault();
}
;

function  ErroExcluirLoja() {
    swal({title: 'Oops...!', type: 'error', text: 'Ocorreu um erro ao Excluir Loja!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-1);
    });
    event.preventDefault();
}
;

function  loginInvalido() {
    swal({title: 'Oops...!', type: 'error', text: 'Você Digitou um Login Inválido! ou Usuário encontra-se Inativo, favor contactar o seu supervisor', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.location.href = '../index.php';
    });
    event.preventDefault();
}
;

function  usuarioNaoCadastrado() {
    swal({title: 'Oops...!', type: 'error', text: 'Usuário não Cadastrado!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.location.href = '../index.php';
    });
    event.preventDefault();
}
;

function exclusaoDemanda() {
    
 swal({title: 'Muito Bem..!', type: 'success', text: 'Demanda Excluída com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-1);
    });
    event.preventDefault();
    
};

function exclusaoLoja() {
    
 swal({title: 'Muito Bem..!', type: 'success', text: 'Loja Excluída com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-1);
    });
    event.preventDefault();
    
};


function exclusaoUsuario() {
    
 swal({title: 'Muito Bem..!', type: 'success', text: 'Usuário Excluído com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
	 window.location.href = '../../view/usuario/listaUsuario.php';
    });
    event.preventDefault();
    
};



function  numeroChamado() {
    swal({title: 'Oops...!', type: 'warning', text: 'Por Favor, Informe o Número do chamado!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-1);
    });
    event.preventDefault();
}
;

function  buscaerro() {
    swal({title: 'Oops...!', type: 'error', text: 'Insira uma palavra para efetuar a Busca!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-1);
    });
    event.preventDefault();
}
;

function  usuarioDesativo() {
    swal({title: 'Oops...!', type: 'error', text: 'Usuário Desativo no Sistema!, favor contactar o seu Supervisor', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-1);
    });
    event.preventDefault();
}
;

function verificaMatricula() {
    swal({title: 'Oops...!', type: 'error', text: 'Já existe essa Matrícula cadastrada no sistema!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-1);
    });
    event.preventDefault();
}
;

function  MatriculaExistente() {
    swal({title: 'Oops...!', type: 'error', text: 'Matrícula Informada já existe!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.history.go(-1);
    });
    event.preventDefault();
}
;

function recuperaSenha() {
    
 swal({title: 'Muito Bem..!', type: 'success', text: 'Foi enviado um Email para a Recuperação da Senha!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.location.href = '../index.php';
    });
    event.preventDefault();
    
};

function  emailInexistente() {
    swal({title: 'Oops...!', type: 'error', text: 'O Email Informado não está cadastrado!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.location.href = '../index.php';
    });
    event.preventDefault();
}
;

function  cadastroRegiao() {
	swal({title: 'Muito Bem..!', type: 'success', text: 'Regiao Cadastrada com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
		window.location.href = '../../view/regiao/listaRegiao.php';
    });

    event.preventDefault();
}
;

function  cadastroEstab() {
	swal({title: 'Muito Bem..!', type: 'success', text: 'Estabelecimento Cadastrado com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
		window.location.href = '../../view/estabelecimento/listaEstabelecimento.php';
    });

    event.preventDefault();
}
;

function  estabErro() {
	swal({title: 'Oops..!', type: 'warning', text: 'Já existe cadastro deste estabelecimento para a Região informada!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
		window.location.href = '../../view/estabelecimento/formEstabelecimento.php';
    });

    event.preventDefault();
}
;

function  regiaoErro() {
	swal({title: 'Oops..!', type: 'warning', text: 'Já existe cadastro de Região com os dados informados!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
		window.location.href = '../../view/regiao/formRegiao.php';
    });

    event.preventDefault();
}
;

function  cadastroEquip() {
	swal({title: 'Muito Bem..!', type: 'success', text: 'Equipamento Cadastrado com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
		window.location.href = '../../view/equipamento/listaEquipamento.php';
    });

    event.preventDefault();
}
;

function  edicaoEstabUsuario() {
    swal({title: 'Muito Bem..!', type: 'success', text: 'Estabelecimento do Usuário Editado com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
        window.close();
    });
    event.preventDefault();
}
;

function  editEquip() {
    swal({title: 'Muito Bem..!', type: 'success', text: 'Equipamento Editado com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
    	window.location.href = '../../view/equipamento/homeEquipamento.php';
    });
    event.preventDefault();
}
;

function  editarEstab(){
    swal({title: 'Muito Bem..!', type: 'success', text: 'Estabelecimento Editado com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
    	window.location.href = '../../view/estabelecimento/homeEstabelecimento.php';
    });
    event.preventDefault();
}
;

function  editarUsuario(){
    swal({title: 'Muito Bem..!', type: 'success', text: 'Usuário Editado com Sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
    	window.location.href = '../../view/usuario/listaUsuario.php';
    });
    event.preventDefault();
}
;

function  tipoEstabErro() {
	swal({title: 'Oops..!', type: 'warning', text: 'Este tipo de Estabelecimento já existe!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
		window.location.href = '../../view/tipo_estabelecimento/listaTipoEstabelecimento.php';
    });

    event.preventDefault();
}
;

function  cadastroTipo(){
    swal({title: 'Muito Bem..!', type: 'success', text: 'Tipo de Estabelecimento cadastrado com sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
    	window.location.href = '../../view/tipo_estabelecimento/listaTipoEstabelecimento.php';
    });
    event.preventDefault();
}
;

function  editarTipo(){
    swal({title: 'Muito Bem..!', type: 'success', text: 'Tipo de Estabelecimento editado com sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
    	window.location.href = '../../view/tipo_estabelecimento/listaTipoEstabelecimento.php';
    });
    event.preventDefault();
}
;

function  verificaEquip() {
	swal({title: 'Oops..!', type: 'warning', text: 'Este Equipamento já existe!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
		window.history.go(-1);
    });

    event.preventDefault();
}
;

function exclusaoEquip() {

    swal({title: "Tem Certeza que Deseja Excluir o Equipamento?", text: "Você não será capaz de recuperar o Equipamento", type: "warning", showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Excluir!", closeOnConfirm: false}, function () {
        swal("Excluído!", "Equipamento foi Excluído.", "success", function () {
          window.location.href = '../view/relatorio.php';
        });
    });
        window.location.href = '../index.php';
    
};

function  editarRegiao(){
    swal({title: 'Muito Bem..!', type: 'success', text: 'Região editada com sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
    	window.location.href = '../../view/regiao/listaRegiao.php';
    });
    event.preventDefault();
}
;

//function exclusaoDemanda() {
//
//    swal({title: "Tem Certeza que Deseja Excluir a Demanda?", text: "Você não será capaz de recuperar a demanda", type: "warning", showCancelButton: true, confirmButtonColor: "#DD6B55", confirmButtonText: "Excluir!", closeOnConfirm: false}, function () {
//        swal("Excluído!", "Demanda foi Excluída.", "success", function () {
//           window.location.href = '../view/relatorio.php';
//        });
//    });
//        window.location.href = '../index.php';
//    
//};

function dtTable() {
	$('#'+id_tabela).DataTable({
		"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs float-right'l>r>"+
		"t"+
		"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
		"autoWidth" : true,
		"oLanguage": {
			"sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
		},
		"oLanguage": {
			"sEmptyTable": "Nenhum registro encontrado",
			"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
			"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
			"sInfoFiltered": "(Filtrados de _MAX_ registros)",
			"sInfoPostFix": "",
			"sInfoThousands": ".",
			"sLengthMenu": "_MENU_ Registros por página",
			"sLoadingRecords": "Carregando...",
			"sProcessing": "Carregando...",
			"sZeroRecords": "Nenhum registro encontrado",
			"sSearch": "Pesquisar: ",
			"oPaginate": {
				"sNext": "Próximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "Último"
			},
			"oAria": {
				"sSortAscending": ": Ordenar colunas de forma ascendente",
				"sSortDescending": ": Ordenar colunas de forma descendente"
			}
		},
		
		"bProcessing": true,
		"bServerSide": true,
		
	});
}

