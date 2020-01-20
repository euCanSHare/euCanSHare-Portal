<?php
/**
 * Class LeadinUtilsTest
 *
 * @package Leadin
 */

use \Leadin\admin\LeadinAdmin as LeadinAdmin;
/**
 * Test leadin-utils.php
 */
class LeadinAdminTest extends WP_UnitTestCase {
	const TEST_PORTAL_ID = 12345;
	const TEST_DOMAIN    = 'my.test.domain';
	private $leadinAdmin;

	public function setUp() {
		$this->leadinAdmin = new LeadinAdmin();
	}

	public function tearDown() {
		delete_option( 'leadin_portalId' );
		delete_option( 'leadin_portal_domain' );
	}

	public function test_action() {
		$res = has_action( 'admin_init', array( $this->leadinAdmin, 'leadin_validate_options' ) );
		$this->assertEquals( $res, true );
	}

	public function test_valid_options() {
		add_option( 'leadin_portalId', LeadinAdminTest::TEST_PORTAL_ID );
		$this->leadinAdmin->leadin_validate_options();
		$this->assertEquals( get_option( 'leadin_portalId' ), LeadinAdminTest::TEST_PORTAL_ID );
		$this->assertEquals( get_option( 'leadin_portal_domain' ), false );

		add_option( 'leadin_portalId', strval( LeadinAdminTest::TEST_PORTAL_ID ) );
		$this->leadinAdmin->leadin_validate_options();
		$this->assertEquals( get_option( 'leadin_portalId' ), strval( LeadinAdminTest::TEST_PORTAL_ID ) );
		$this->assertEquals( get_option( 'leadin_portal_domain' ), false );

		add_option( 'leadin_portal_domain', LeadinAdminTest::TEST_DOMAIN );
		$this->leadinAdmin->leadin_validate_options();
		$this->assertEquals( get_option( 'leadin_portalId' ), LeadinAdminTest::TEST_PORTAL_ID );
		$this->assertEquals( get_option( 'leadin_portal_domain' ), LeadinAdminTest::TEST_DOMAIN );
	}

	public function test_invalid_portal_id() {
		add_option( 'leadin_portalId', 'foo' );
		add_option( 'leadin_portal_domain', LeadinAdminTest::TEST_DOMAIN );
		$this->leadinAdmin->leadin_validate_options();
		$this->assertEquals( get_option( 'leadin_portalId' ), false );
		$this->assertEquals( get_option( 'leadin_portal_domain' ), false );
	}

	public function test_invalid_portal_domain() {
		add_option( 'leadin_portalId', LeadinAdminTest::TEST_PORTAL_ID );
		add_option( 'leadin_portal_domain', 'invalid domain' );
		$this->leadinAdmin->leadin_validate_options();
		$this->assertEquals( get_option( 'leadin_portalId' ), LeadinAdminTest::TEST_PORTAL_ID );
		$this->assertEquals( get_option( 'leadin_portal_domain' ), false );
	}
}
