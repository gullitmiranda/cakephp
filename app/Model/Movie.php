<?
/**
* Model Moviel
*/
class Movie extends AppModel {
  public $name = 'Movie';
  public $validate = array(
    'title' => array(
      'rule' => 'notEmpty'
    ),
    'body' => array(
      'rule' => 'notEmpty'
    )
  );

  /* Salva o id do vídeo
  */
  public function afterSave($options = array()) {
    if (isset($this->data[$this->alias]['movie_id'])) {
      $this->data[$this->alias]['movie_id'] = $this->extractID();
    }
    return true;
  }

  /* Extrai o ID
  */
  public function extractID() {
    $pattern =
      '%^# Match any youtube URL
      (?:https?://)?  # Optional scheme. Either http or https
      (?:www\.)?      # Optional www subdomain
      (?:             # Group host alternatives
        youtu\.be/    # Either youtu.be,
      | youtube\.com  # or youtube.com
        (?:           # Group path alternatives
          /embed/     # Either /embed/
        | /v/         # or /v/
        | /watch\?v=  # or /watch\?v=
        )             # End path alternatives.
      )               # End host alternatives.
      ([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
      $%x'
      ;
    $result = preg_match($pattern, $this->data[$this->alias]['movie_id'], $matches);

    if (false !== $result) {
      return $matches[1];
    }
    return null;
  }


  // http://www.youtube.com/watch?v=Q6gMkDuayMQ

  public function updateViewCount() {
    return $this->set('views', $this->views+1);
  }
}
