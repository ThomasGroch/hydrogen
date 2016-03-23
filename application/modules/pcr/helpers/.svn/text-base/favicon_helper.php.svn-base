<?php

function get_site_favicon($url)
{
    $ch = curl_init('http://www.google.com/s2/favicons?domain=' . $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function save_site_favicon($url, $name, $location = NULL)
{
    $url = get_domain_name($url);
    $path_aux = !empty($location) ? $location : 'upload/';
    $file_name_path = $path_aux . $name . '' . '.png';
    $save_file_name = APPPATH . $file_name_path;
    $fp = fopen($save_file_name, 'w+');
    $ch = curl_init('http://www.google.com/s2/favicons?domain=' . $url);

    curl_setopt($ch, CURLOPT_TIMEOUT, 6);

    /* Save the returned data to a file */
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_exec($ch);
    curl_close($ch);
    $fclose = fclose($fp);
    if ( $fclose === TRUE )
        return $file_name_path;
    return FALSE;
}

function get_domain_name($url) {
  $pieces = parse_url($url); 
  return $domain = isset($pieces['host']) ? $pieces['host'] : $url;
  if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
    return $regs['domain'];
  }
  return false;
}

  /*
function get_domain_name($url)
{
    preg_match("http[s]*://([a-zA-Z0-9.-]*)/?.*", $url, $domain);
    $domain = explode(".", $domain[1]);

    if ( strlen(end($domain)) == 2 && ( strlen($domain[count($domain) - 2]) == 3 || strlen($domain[count($domain) - 2]) == 2 ) )
    {
        # special case domains -- ex: co.uk .in .ca
        return strtolower($domain[count($domain) - 3] . "." . $domain[count($domain) - 2] . "." . end($domain));
    }
    else
    {
        # regular .com type domains -- three or more letters
        return strtolower($domain[count($domain) - 2] . "." . end($domain));
    }
}
   * */