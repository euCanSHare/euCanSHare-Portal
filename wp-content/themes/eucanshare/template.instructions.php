<?php

/*
Template Name: Instructions
*/

?>


<?php get_header(); ?>

<section id="" class="page-default single">
	<div class="item-img cover cover-center primary-image" style="height:100px;background-image:url(<?php echo  the_post_thumbnail_url('large');  ?>)"></div>
        <div class="content-overlap">
            <div class="wrapper ">
                <div class="container">
                    <h2 class="section-title"><?php the_title();?></h2>
                        <p>Tool developers should follow <strong>four basic steps</strong> that provides
                        openVRE with the sufficient information to accomplish the whole tool execution cycle,
                        explained in detail at <a style="font-weight: bold; color: #00738c;" href="http://portal.ipc-project.bsc.es/dataportal/?page_id=697">
                        Bring your tool → Integration of tools </a>. Once these steps are completed, openVRE will be able to:</p>
                    <div>
                        <div class="row">
                            <div class="col-6">
                                <ul>
                                    <li> Prepare your tool web interface.</li>
                                    <li> Check your tool input and arguments requirements.</li>
                                    <li> Stage in input files.</li>
                                    <li> Stage out output files.</li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <li> Prepare command line execution.</li>
                                <li> Execute your tool.</li>
                                <li> Monitor your tool executions.</li>
                                <li> Register back your tool results.</li>
                            </div>
                        </div>

                        <div class="mt-2">
                            <h3>Step 1: Wrap you application using mg-tool API</h3>
                            <br>
                            <p><b>0 - Clone skeleton tool.</b></p>
                            <p>Use the test tool from the mg-process-test from Github repository as template for creating your new tool. See the <a href="http://multiscale-genomics.readthedocs.io/en/latest/howto/development_checklist.html" target="_blank" rel="noopener noreferrer">
                            HOWTO - Github</a> for details.</p>
                            <p><b>1 - Create a Tool.</b> <br>See the <a href="http://multiscale-genomics.readthedocs.io/en/latest/howto/howto_tool.html">HOWTO - Tools</a> for details about writing a tool and <a href="http://multiscale-genomics.readthedocs.io/en/latest/howto/howto_testing.html">
                            HOWTO - Test Your Code</a> about how to write relevant tests. </p>
                            <p><b>2 - Create a Pipeline.</b></p>
                            <p>See the <a href="http://multiscale-genomics.readthedocs.io/en/latest/howto/howto_pipeline.html">HOWTO - Pipelines</a> for details about writing a pipeline and <a href="http://multiscale-genomics.readthedocs.io/en/latest/howto/howto_testing.html">
                            HOWTO - Test Your Code</a> about how to write relevant tests.</p>
                            <p><b>3 - Test the Pipeline using openVRE configuration files.</b></p>
                            <p>Reproduce the openVRE call to test your code Github two JSON files need to be prepared: the ‘job configuration file’ and the ‘input metadata file’. See the section above and <a href="http://multiscale-genomics.readthedocs.io/en/latest/howto/howto_config.html">
                            HOWTO - Configuration Files</a> for details about writing a openVRE JSON configuration files.</p>
                            <p><b>4 - Installation Documentation. </b></p>
                            <p>See the <a href="http://multiscale-genomics.readthedocs.io/en/latest/howto/howto_documentation.html">HOWTO - Documentation</a> for an extended explanation on how to document your code.</p>
                            <p><b>5 - COMPSs testing.</b></p>
                            <p>Now that you have a functional pipeline, it's time to test it within a COMPSs environment. Download the latest version of the <a href="https://www.bsc.es/research-and-development/software-and-apps/software-list/comp-superscalar/">
                            COMPSs virtual machine</a> from the BSC website. &nbsp;</p>
                            <h3>Step 2: &nbsp;&nbsp; Register the tool into openVRE</h3>
                            <br>
                            <p>In order to register your tool at the openVRE, you need to have your application
                            wrapped and its code accessible on any repository. With that, next step is make the
                            central openVRE aware that a new tool exists. To do so, the only requirement is to
                            submit a JSON file, the <strong>specification file</strong>. in which all tools
                            details are specified:</p>
                            <ol>
                                <li> Tool descriptions: titles, keywords, etc.</li>
                                <li> Input files and their requirements: accepted data types and formats, etc.</li>
                                <li> Tool arguments</li>
                                <li> Expected output files</li>
                            </ol>
                            <p>In the following button, a detailed explanation will guide you on how to create this file. Validate it using the given schema with any JSON validator
                            (i.e, <a href="http://www.jsonschemavalidator.net/">jsonschemavalidator.net</a>).</p>
                            <p><button style="background-color: #00738c; font-size: 16px;"> <a style="color: white;" title="MuG Community" href="https://www.multiscalegenomics.eu/MuGVRE/integration-of-tools/tool-specification-file/">
                            FORMAT SPECIFICATIONS »</a> </button> &nbsp;</p>
                            <h3>Step 3: Test the tool virtual machine</h3>
                            <br>
                            <p><a href="mailto:support_eucanshare@bsc.es">Contact us</a> and we’ll prepare and deploy a virtual machine for you in our testing cloud. As explained in detail at <a href="https://www.multiscalegenomics.eu/MuGVRE/integration-of-tools/tool-virtual-machine/">
                            Integration of tools → Tool Virtual Machine </a>, it has all the openVRE software installed, like pyCOMPSs and mg-tool API libraries, and it is ready for you to install your tool.</p>
                            <p>Another option is to deploy on your own virtualization system the KVM disk image were are distributing. Once your code is running there, you can <a href="mailto:support.eucanshare@bsc.es">contact us</a>, so that we’ll deploy it at the testing cloud. Here, are the details of the image.</p>
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="3">Neat base image for VM tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>Location</p>
                                        </td>
                                        <td>
                                            <p><a href="/VMs/VM_generic.qcow2">VMGeneric.qcow2</a> (5.4G)</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Description</p>
                                        </td>
                                        <td>
                                            <p>The image is ready to be deployed via PMES 2.3 (specific configurations described <a href="http://compss.bsc.es/svn/releases/pmes/v2.3/doc/installation-guide.html" target="_blank" rel="noopener noreferrer">here</a>). Relevant software includes: OCCI client 4.3.10, COMPSs 2.2, Python 2.7.6 and OpenJDK 1.8 Authentication: Username is 'pmes' and password 'pmes2017'</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Virtual Disk</p>
                                        </td>
                                        <td>
                                            <p>18GB</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Operating system</p>
                                        </td>
                                        <td>
                                            <p>Ubuntu 14.04</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>Both options end up having your tool VM at the cloud where openVRE is going to deploy it. So reached this point, you'll be able to test the tool from the openVRE portal, accessing also the “Tool developer panel” that offers some debugging utilities. &nbsp;</p>
                            <h3 class=>Step 4: &nbsp;&nbsp; Supply web data</h3>
                            <br>
                            <p>Last but not least, the portal requires some information about the new tool to display it at the web interface. The complete list of items required is defined at the <a href="http://www.multiscalegenomics.eu/MuGVRE/integration-of-tools/web-site/">Integration of tools → Web site</a> section. Send them to us, except for the ‘tool documentation’, which can be directly edited online once you are granted ‘tool developer’ permissions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>