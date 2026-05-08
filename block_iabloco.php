<?php
defined('MOODLE_INTERNAL') || die();

class block_iabloco extends block_base {
    public function init() {
        $this->title = get_string('pluginname', 'block_iabloco');
    }

    public function get_content() {
        global $CFG;
        if ($this->content !== null) {
            return $this->content;
        }
        $this->content = new stdClass();
        $this->content->text = '
            <form method="post" action="' . $CFG->wwwroot . '/blocks/iabloco/ask.php">
                <input type="hidden" name="sesskey" value="' . sesskey() . '">
                <textarea name="pergunta" rows="3" style="width:100%" placeholder="Digite sua pergunta..."></textarea>
                <br>
                <input type="submit" value="Enviar">
            </form>
        ';
        return $this->content;
    }
}