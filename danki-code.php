<?php
    /*
        **Plugin Name: Danki Code Ultimate
        **Description: Este é um plugin para estilizar nossas páginas.
    */

    function myShortCode(){
        $shortCode = "<h2>Aqui vai o conteúdo do seu plugin!</h2>";
        return $shortCode;
    }
    
    add_shortcode('danki1','myShortCode');

    function myMenu(){
        add_menu_page('Título da Página','Danki Ultimate','manage_options','danki-code-ultimate','dankicode_page','','200');
    }

    add_action('admin_menu','myMenu');

    function dankicode_page(){
        if(array_key_exists('acao', $_POST)){
            update_option('conteudo_html',$_POST['conteudo_html']);
            echo'<div class-"notice notice=sucess is-dismissible">
            <p><strong>Aleterações foram salvas com sucesso!</strong></p>
            <button type="button" class="notice-dimiss">
            <span class="screen-reader-text">fechar.</span>
            </button>
            </div>';
        }
        $conteudo_html = get_option('conteudo_html');
        echo '
        <div class="wrap"
            <h2>Bem-vindo(a) ao Dank
                <label for="nome">Conteúdo HTML:</label>
                <textarea name="conteudo_html" class="large-text" placeholder="Conteúdo HTML">'.$conteudo_html.'</textarea>
                <input type="submit" name="acao" value="Enviar" class="button-primary" />
            </form>
        </div>

        ';
    }

    function getConteudoHead(){
        $conteudo_html = get_option('conteudo_html');
        echo $conteudo_html;
    }

    function getConteudoFooter(){
        $conteudo_html = get_option('conteudo_html');
        echo $conteudo_html;
    }

    add_action('wp_head','getConteudoHead');

    add_action('wp_footer', 'getConteudoFooter');

?>