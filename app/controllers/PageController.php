<?php
class PageController extends Controller
{
    public function contact()
    {
        $data = [
            'title' => $this->translation->get('contact'),
            'contact_title' => $this->translation->get('contact_title'),
            'description' => 'Contact us for any questions or concerns'
        ];
        $this->view('pages/contact', $data);
    }

    public function terms()
    {
        $data = [
            'title' => $this->translation->get('terms'),
            'description' => 'Terms of Use for our website'
        ];
        $this->view('pages/terms', $data);
    }

    public function privacy()
    {
        $data = [
            'title' => $this->translation->get('privacy'),
            'description' => 'Privacy Policy for our website'
        ];
        $this->view('pages/privacy', $data);
    }

    public function about()
    {
        $data = [
            'title' => $this->translation->get('about_us'),
            'description' => 'About our company'
        ];
        $this->view('pages/about', $data);
    }

    public function services()
    {
        $data = [
            'title' => $this->translation->get('services'),
            'description' => 'Our services'
        ];
        $this->view('pages/services', $data);
    }

    public function cookies()
    {
        $data = [
            'title' => $this->translation->get('cookies'),
            'description' => 'Cookie Policy'
        ];
        $this->view('pages/cookies', $data);
    }

    public function disclaimer()
    {
        $data = [
            'title' => $this->translation->get('disclaimer'),
            'description' => 'Website Disclaimer'
        ];
        $this->view('pages/disclaimer', $data);
    }
}
?>