<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Site;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;

class SiteController extends Controller
{


    protected $site, $page;

    public function __construct(){

        $this->site = new Site();
        $this->page = new Page();
        
    }




    // VIEW HOME

    public function viewHome(){

        return view('pages.home', [
            'pageHeadings' => [
                'A true crime corner of the internet',
                'News and statistics on high profile true crime cases.'
            ],
            'criminal_cases' => $this->site->criminalCases(false, 4, 'public', true),
            'criminals' => $this->site->criminals(false, 10),
            'articles' => $this->site->articles(false, 10),
            'state_counts' => $this->site->getStateCounts(false, 10),
        ]);

    }




    // VIEW ABOUT

    public function viewAboutUs(){

        $this->page->injectMetadata('About us', true);

        return view('pages.about-us', [
            'pageHeadings' => [
                'About us',
                'What we do at '.config('app.name').'.'
            ]
        ]);

    }




    // VIEW CONTACT US

    public function viewContactUs(){

        $this->page->injectMetadata('Contact us', true);

        return view('pages.contact-us', [
            'pageHeadings' => [
                'Contact us',
                'Ask us anything'
            ]
        ]);

    }




    // SEND CONTACT MESSAGE

    public function sendContactMessage(Request $request){

        

    }




    // VIEW OPPORTUNITIES

    public function viewOpportunities(){

        $this->page->injectMetadata('Opportunities', true);

        return view('pages.opportunities', [
            'pageHeadings' => [
                'Opportunities',
                'Become a contributer at '.config('app.name').'.'
            ]
        ]);

    }




    // VIEW PRIVACY POLICY

    public function viewPrivacyPolicy(){

        $this->page->injectMetadata('Privacy policy', true, '', true);

        return view('pages.privacy-policy', [
            'pageHeadings' => [
                'Privacy policy',
                'View our privacy policy at '.config('app.name').'.'
            ],
            'navButtons' => [
                [
                    'name' => 'Overview',
                    'scroll-to' => 'overview'
                ],
                [
                    'name' => 'Hosting',
                    'scroll-to' => 'hosting'
                ],
                [
                    'name' => 'General information',
                    'scroll-to' => 'generalInformation'
                ],
                [
                    'name' => 'Data recording',
                    'scroll-to' => 'dataRecording'
                ],
                [
                    'name' => 'Social media',
                    'scroll-to' => 'socialMedia'
                ],
                [
                    'name' => 'Analytics',
                    'scroll-to' => 'analytics'
                ],
                [
                    'name' => 'Plug-ins',
                    'scroll-to' => 'plugins'
                ],
            ],
        ]);

    }




    // VIEW TERMS OF USE

    public function viewTermsOfUse(){

        $this->page->injectMetadata('Terms of use', true, '', true);

        return view('pages.terms-of-use', [
            'pageHeadings' => [
                'Terms of use',
                'View the terms of use on '.config('app.name').'.'
            ],
            'navButtons' => [
                [
                    'name' => 'Overview',
                    'scroll-to' => 'overview'
                ],
                [
                    'name' => 'Information',
                    'scroll-to' => 'information'
                ],
                [
                    'name' => 'At a glance',
                    'scroll-to' => 'atAGlance'
                ],
                [
                    'name' => 'Terms of use',
                    'scroll-to' => 'termsOfUse'
                ],
                [
                    'name' => 'Liability',
                    'scroll-to' => 'liability'
                ],
                [
                    'name' => 'US users',
                    'scroll-to' => 'usUsers'
                ],
                [
                    'name' => 'Common provisions',
                    'scroll-to' => 'commonProvisions'
                ],
            ]
        ]);

    }




    /// GRAB SEARCH TERM

    public function grabSearchTerm(Request $request){
        $request->validate([
            'search_term' => ''
        ]);

        return redirect('search/'.$request->search_term);
        
    }




    // SEARCH RESULTS

    public function searchResults(string $search_term = null){

        $criminal_cases = $this->site->searchCriminalCases($search_term);
        $articles = $this->site->searchArticles($search_term);
        $criminals = $this->site->searchCriminals($search_term);

        $total_results = count($criminal_cases) + count($articles) + count($criminals);

        return view('pages.search-results', [
            'pageHeadings' => [
                'Seach results',
                $total_results . ' results found for seach term: "'.$search_term.'"'
            ],
            'criminal_cases' => $criminal_cases,
            'articles' => $articles,
            'criminals' => $criminals,
        ]);
    }




// END OF CLASS
    
}
