<?php
function autoriza() {
    $ci = get_instance();
    $usuarioLogado = $ci->session->userdata("usuario_logado");
    if(!$usuarioLogado) {
        $ci->session->set_flashdata("danger", "Você precisa estar logado");
        redirect("/");
    }
    return $usuarioLogado;
}


function nivelAcesso($nivel,$local){
  $ci = get_instance();
  $usuarioLogado = $ci->session->userdata("usuario_logado");
  //print_r ($usuarioLogado);
  //echo $usuarioLogado["hierarquia_idHierarquia"];
  if($usuarioLogado["hierarquia_idHierarquia"] != $nivel){

    $ci->session->set_flashdata("danger", "Você não tem acesso a está funcionalidade");
    redirect("/$local");
  }else{
    return $usuarioLogado;
  }

}
