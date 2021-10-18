
<?php 

 $idFun = $_GET['id']; // pegando id do funcionario
 $valoratual = $_GET['valoratual'];
?>




<section class="masthead .bg-secondary.bg-gradient bg-opacity-25 text-white text-center" >
    <div class="container d-flex  flex-column">
               
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Cadastro de Movimentações</h2>
              
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
               
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                         <form  action="php/Movimentacao/cadastroMovimentacao.php?valoratual=<?php echo $valoratual?>" method="post" id="func" data-sb-form-api-token="API_TOKEN">
                           <div class="col-12">
                                <label class="visually-hidden" for="inlineFormSelectPref">Tipo de Movimentaçõa</label>
                                <select class="form-select" name="tipoMovimentacao"id="tipoMovimentacao">
                                        <option value="entrada" selected>Entrada</option>
                                        <option value="saida">Saída</option>
                               </select>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input class="form-control" id="valorMovimentacao" name="valorMovimentacao" onkeyup="somenteNumeros(this);" maxlength="15" type="text" ng-model="numero.valor" placeholder="1000"  required />
                                <label for="name">Valor </label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Campo obrigatorio.</div>
                            </div>
                          
                            <div class="form-floating mb-3">
                                <input class="form-control" id="funcionarioMovimentacao" value="<?php echo $idFun?>"  name="funcionarioMovimentacao" type="hidden" placeholder="Nome.." required />
                                <label for="name">Funcionário</label>
                                <div class="invalid-feedback" data-sb-feedback="senha:required">Campo obrigatorio.</div>
                            
                            </div>
                             <div class="form-floating mb-3">
                                <input class="form-control" id="observacaoMovimentacao" name="observacaoMovimentacao" type="text" placeholder="Entrega de projeto antes do prazo "  required />
                                <label for="name">Observação </label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Campo obrigatorio.</div>
                            </div>
                       
                          <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-primary outline btn-xl  " id="submitButton" type="submit">Cadastrar</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>