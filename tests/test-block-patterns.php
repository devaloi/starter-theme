<?php
/**
 * Tests for block pattern functionality
 *
 * @package starter-theme
 */

class Test_Block_Patterns extends WP_UnitTestCase {

	/**
	 * @var Starter_Theme\Block_Patterns
	 */
	private $block_patterns;

	public function setUp(): void {
		parent::setUp();
		$this->block_patterns = new Starter_Theme\Block_Patterns();
		$this->block_patterns->init();
		
		// Trigger the registration
		do_action( 'init' );
	}

	/**
	 * Test pattern category is registered
	 */
	public function test_pattern_category_registered() {
		$categories = WP_Block_Pattern_Categories_Registry::get_instance()->get_all_registered();
		
		$starter_theme_category = null;
		foreach ( $categories as $category ) {
			if ( $category['name'] === 'starter-theme' ) {
				$starter_theme_category = $category;
				break;
			}
		}

		$this->assertNotNull( $starter_theme_category );
		$this->assertEquals( 'Starter Theme', $starter_theme_category['label'] );
		$this->assertEquals( 'Patterns for the Starter Theme.', $starter_theme_category['description'] );
	}

	/**
	 * Test patterns are registered
	 */
	public function test_patterns_registered() {
		$registry = WP_Block_Patterns_Registry::get_instance();
		
		$expected_patterns = [
			'starter-theme/hero',
			'starter-theme/call-to-action',
			'starter-theme/testimonials',
			'starter-theme/faq-accordion',
			'starter-theme/team-grid',
			'starter-theme/featured-posts',
		];

		foreach ( $expected_patterns as $pattern_name ) {
			$this->assertTrue( 
				$registry->is_registered( $pattern_name ),
				"Pattern {$pattern_name} should be registered"
			);
		}
	}

	/**
	 * Test pattern content structure
	 */
	public function test_hero_pattern_structure() {
		$registry = WP_Block_Patterns_Registry::get_instance();
		$hero_pattern = $registry->get_registered( 'starter-theme/hero' );
		
		$this->assertNotNull( $hero_pattern );
		$this->assertEquals( 'Hero Section', $hero_pattern['title'] );
		$this->assertContains( 'starter-theme', $hero_pattern['categories'] );
		$this->assertContains( 'header', $hero_pattern['categories'] );
		$this->assertNotEmpty( $hero_pattern['content'] );
		
		// Check for expected blocks in content
		$this->assertStringContainsString( 'wp:cover', $hero_pattern['content'] );
		$this->assertStringContainsString( 'wp:heading', $hero_pattern['content'] );
		$this->assertStringContainsString( 'wp:buttons', $hero_pattern['content'] );
	}

	/**
	 * Test call-to-action pattern structure
	 */
	public function test_cta_pattern_structure() {
		$registry = WP_Block_Patterns_Registry::get_instance();
		$cta_pattern = $registry->get_registered( 'starter-theme/call-to-action' );
		
		$this->assertNotNull( $cta_pattern );
		$this->assertEquals( 'Call to Action', $cta_pattern['title'] );
		$this->assertContains( 'starter-theme', $cta_pattern['categories'] );
		$this->assertContains( 'call-to-action', $cta_pattern['categories'] );
		$this->assertStringContainsString( 'wp:group', $cta_pattern['content'] );
		$this->assertStringContainsString( 'wp:button', $cta_pattern['content'] );
	}

	/**
	 * Test testimonials pattern structure
	 */
	public function test_testimonials_pattern_structure() {
		$registry = WP_Block_Patterns_Registry::get_instance();
		$testimonials_pattern = $registry->get_registered( 'starter-theme/testimonials' );
		
		$this->assertNotNull( $testimonials_pattern );
		$this->assertEquals( 'Testimonials Grid', $testimonials_pattern['title'] );
		$this->assertContains( 'testimonials', $testimonials_pattern['categories'] );
		$this->assertStringContainsString( 'wp:columns', $testimonials_pattern['content'] );
		$this->assertStringContainsString( 'wp:quote', $testimonials_pattern['content'] );
	}

	/**
	 * Test team grid pattern structure
	 */
	public function test_team_grid_pattern_structure() {
		$registry = WP_Block_Patterns_Registry::get_instance();
		$team_pattern = $registry->get_registered( 'starter-theme/team-grid' );
		
		$this->assertNotNull( $team_pattern );
		$this->assertEquals( 'Team Grid', $team_pattern['title'] );
		$this->assertContains( 'about', $team_pattern['categories'] );
		$this->assertContains( 'people', $team_pattern['categories'] );
		$this->assertStringContainsString( 'wp:social-links', $team_pattern['content'] );
	}

	/**
	 * Test featured posts pattern structure
	 */
	public function test_featured_posts_pattern_structure() {
		$registry = WP_Block_Patterns_Registry::get_instance();
		$featured_posts_pattern = $registry->get_registered( 'starter-theme/featured-posts' );
		
		$this->assertNotNull( $featured_posts_pattern );
		$this->assertEquals( 'Featured Posts', $featured_posts_pattern['title'] );
		$this->assertContains( 'posts', $featured_posts_pattern['categories'] );
		$this->assertStringContainsString( 'wp:query', $featured_posts_pattern['content'] );
		$this->assertStringContainsString( 'wp:post-template', $featured_posts_pattern['content'] );
	}

	/**
	 * Test FAQ pattern structure
	 */
	public function test_faq_pattern_structure() {
		$registry = WP_Block_Patterns_Registry::get_instance();
		$faq_pattern = $registry->get_registered( 'starter-theme/faq-accordion' );
		
		$this->assertNotNull( $faq_pattern );
		$this->assertEquals( 'FAQ Accordion', $faq_pattern['title'] );
		$this->assertContains( 'faq', $faq_pattern['categories'] );
		$this->assertStringContainsString( 'wp:html', $faq_pattern['content'] );
		$this->assertStringContainsString( '<details', $faq_pattern['content'] );
		$this->assertStringContainsString( '<summary', $faq_pattern['content'] );
	}

	/**
	 * Test pattern keywords
	 */
	public function test_pattern_keywords() {
		$registry = WP_Block_Patterns_Registry::get_instance();
		
		$hero_pattern = $registry->get_registered( 'starter-theme/hero' );
		$this->assertContains( 'hero', $hero_pattern['keywords'] );
		$this->assertContains( 'banner', $hero_pattern['keywords'] );
		$this->assertContains( 'cta', $hero_pattern['keywords'] );
		
		$testimonials_pattern = $registry->get_registered( 'starter-theme/testimonials' );
		$this->assertContains( 'testimonials', $testimonials_pattern['keywords'] );
		$this->assertContains( 'reviews', $testimonials_pattern['keywords'] );
		$this->assertContains( 'social-proof', $testimonials_pattern['keywords'] );
	}

	/**
	 * Test pattern content is valid HTML
	 */
	public function test_pattern_content_validity() {
		$registry = WP_Block_Patterns_Registry::get_instance();
		$patterns = [
			'starter-theme/hero',
			'starter-theme/call-to-action',
			'starter-theme/testimonials',
			'starter-theme/team-grid',
			'starter-theme/featured-posts',
		];

		foreach ( $patterns as $pattern_name ) {
			$pattern = $registry->get_registered( $pattern_name );
			$this->assertNotNull( $pattern );
			
			// Test that content is not empty
			$this->assertNotEmpty( $pattern['content'] );
			
			// Test that content contains WordPress blocks
			$this->assertStringContainsString( '<!-- wp:', $pattern['content'] );
			$this->assertStringContainsString( '<!-- /wp:', $pattern['content'] );
			
			// Test that content uses theme design tokens
			$this->assertStringContainsString( 'var:preset', $pattern['content'] );
		}
	}
}