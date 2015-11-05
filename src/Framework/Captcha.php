<?php

namespace Framework;

/**
 * Captcha security image generator - simple for simplicity
 *
 */
class Captcha
{
    /**
     * @var int
     */
    private $width = 80;
    /**
     * @var int
     */
    private $height = 25;
    /**
     * @var Session
     */
    private $session;

    /**
     * @param Session $session
     */
    public function __construct(Session $session)
    {

        $this->session = $session;
    }

    /**
     * Outputs an captcha image to the STDOUT
     *
     */
    public function outputImage()
    {
        $image = imagecreatetruecolor($this->width, $this->height) or die("Cannot Initialize new GD image stream");

        $backgroundColor = imagecolorallocate($image, 55, 55, 55);
        imagefilledrectangle($image, 0, 0, $this->width, $this->height, $backgroundColor);

        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $len = strlen($letters);

        $textColor = imagecolorallocate($image, 125, 125, 125);

        $word = "";
        for ($i = 0; $i < 4; $i++) {
            $letter = $letters[rand(0, $len - 1)];
            imagestring($image, 7, 5 + ($i * 20), 5, $letter, $textColor);
            $word .= $letter;
        }

        $this->session->set('captcha', $word);

        $this->outputHeaders();

        imagepng($image);
    }

    /**
     *
     * @param string $word
     *
     * @return bool
     */
    public function check($word)
    {
        return $this->session->get('captcha') === $word;
    }

    /**
     * disables caching
     */
    private function outputHeaders()
    {
        header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
        header('Pragma: no-cache'); // HTTP 1.0.
        header('Expires: 0'); // Proxies.
        header("Content-Type: image/png", 200);
    }
}