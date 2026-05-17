import React from 'react';
import { Head } from '@inertiajs/react';
import { motion } from 'framer-motion';
import { Mail, MapPin, Download, Briefcase, Code, Terminal, Server, Database, Globe } from 'lucide-react';

const Github = ({ className }) => (
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className={className}>
    <path d="M15 22v-4a4.8 4.8 0 0 0-1-3.5c3 0 6-2 6-5.5.08-1.25-.27-2.48-1-3.5.28-1.15.28-2.35 0-3.5 0 0-1 0-3 1.5-2.64-.5-5.36-.5-8 0C6 2 5 2 5 2c-.3 1.15-.3 2.35 0 3.5A5.403 5.403 0 0 0 4 9c0 3.5 3 5.5 6 5.5-.39.49-.68 1.05-.85 1.65-.17.6-.22 1.23-.15 1.85v4"/>
    <path d="M9 18c-4.51 2-5-2-7-2"/>
  </svg>
);

const Linkedin = ({ className }) => (
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className={className}>
    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
    <rect width="4" height="12" x="2" y="9"/>
    <circle cx="4" cy="4" r="2"/>
  </svg>
);

const technologyIcons = {
    'laravel': <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" alt="Laravel" className="w-6 h-6" />,
    'react.js': <Globe className="w-6 h-6 text-blue-400" />,
    'vue.js': <Globe className="w-6 h-6 text-green-500" />,
    'tailwind css': <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" alt="Tailwind" className="w-6 h-6" />,
    'mysql': <Database className="w-6 h-6 text-orange-500" />,
    'postgresql': <Database className="w-6 h-6 text-blue-300" />,
    'php': <Server className="w-6 h-6 text-indigo-400" />,
    'javascript': <Terminal className="w-6 h-6 text-yellow-400" />,
    'typescript': <Terminal className="w-6 h-6 text-blue-500" />,
    'node.js': <Server className="w-6 h-6 text-green-500" />,
};

const getTechIcon = (techName) => {
    const key = techName.toLowerCase();
    return technologyIcons[key] || <Code className="w-6 h-6 text-gray-400" />;
};

export default function Portfolio({ user, projects, experiences }) {
    return (
        <div className="min-h-screen bg-gray-950 text-white font-sans selection:bg-indigo-500/30">
            <Head title={`Portfolio | ${user?.name || 'Developer'}`} />
            
            {/* Navbar (Glassmorphism) */}
            <nav className="fixed w-full z-50 top-0 transition-all duration-300 backdrop-blur-md bg-gray-950/60 border-b border-gray-800">
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex justify-between items-center h-16">
                        <span className="text-xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-cyan-400">
                            {user?.name || 'Dev.Portfolio'}
                        </span>
                        <div className="flex space-x-6 text-sm font-medium">
                            <a href="#about" className="hover:text-white text-gray-400 transition-colors">About</a>
                            <a href="#experience" className="hover:text-white text-gray-400 transition-colors">Experience</a>
                            <a href="#projects" className="hover:text-white text-gray-400 transition-colors">Projects</a>
                        </div>
                    </div>
                </div>
            </nav>

            <main className="pt-24 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-32 pb-32">
                
                {/* Hero Section */}
                <motion.section 
                    id="about"
                    initial={{ opacity: 0, y: 30 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ duration: 0.8 }}
                    className="flex flex-col-reverse lg:flex-row items-center gap-12 pt-16 lg:pt-32"
                >
                    <div className="flex-1 space-y-8">
                        <h1 className="text-6xl lg:text-8xl font-black tracking-tighter text-white">
                            {user?.name}<span className="text-white opacity-20">.</span>
                        </h1>
                        <p className="text-xl lg:text-2xl text-gray-400 font-light leading-relaxed max-w-2xl">
                            {user?.summary || "Software Developer & Designer."}
                        </p>
                        
                        {user?.location && (
                            <div className="flex items-center gap-3 text-gray-500 font-medium tracking-wide uppercase text-sm">
                                <MapPin className="w-4 h-4 text-gray-400" />
                                <span>{user.location}</span>
                            </div>
                        )}

                        <div className="flex flex-wrap gap-6 pt-4">
                            {user?.github_url && (
                                <a href={user.github_url} target="_blank" rel="noreferrer" className="group flex items-center gap-3 text-gray-400 hover:text-white transition-all">
                                    <div className="p-3 bg-gray-900 rounded-full group-hover:bg-gray-800 transition-colors">
                                        <Github className="w-5 h-5" />
                                    </div>
                                    <span className="font-medium text-sm tracking-wide">GitHub</span>
                                </a>
                            )}
                            {user?.linkedin_url && (
                                <a href={user.linkedin_url} target="_blank" rel="noreferrer" className="group flex items-center gap-3 text-gray-400 hover:text-white transition-all">
                                    <div className="p-3 bg-gray-900 rounded-full group-hover:bg-[#0a66c2]/20 group-hover:text-[#0a66c2] transition-colors">
                                        <Linkedin className="w-5 h-5" />
                                    </div>
                                    <span className="font-medium text-sm tracking-wide">LinkedIn</span>
                                </a>
                            )}
                            {user?.email && (
                                <a href={`mailto:${user.email}`} className="group flex items-center gap-3 text-gray-400 hover:text-white transition-all">
                                    <div className="p-3 bg-gray-900 rounded-full group-hover:bg-white group-hover:text-black transition-colors">
                                        <Mail className="w-5 h-5" />
                                    </div>
                                    <span className="font-medium text-sm tracking-wide">Contact</span>
                                </a>
                            )}
                        </div>
                    </div>
                </motion.section>

                {/* Experience Timeline */}
                <motion.section 
                    id="experience"
                    initial={{ opacity: 0 }}
                    whileInView={{ opacity: 1 }}
                    viewport={{ once: true, margin: "-100px" }}
                    transition={{ duration: 0.6 }}
                >
                    <div className="flex items-center gap-4 mb-12">
                        <Briefcase className="w-8 h-8 text-indigo-400" />
                        <h2 className="text-3xl font-bold">Experience</h2>
                    </div>

                    <div className="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-gray-800 before:to-transparent">
                        {experiences?.length > 0 ? experiences.map((exp, index) => (
                            <div key={exp.id} className="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                                {/* Icon */}
                                <div className="flex items-center justify-center w-10 h-10 rounded-full border-4 border-gray-950 bg-indigo-500 text-white shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                                    <div className="w-2 h-2 rounded-full bg-white"></div>
                                </div>
                                
                                {/* Content */}
                                <div className="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-6 rounded-2xl bg-gray-800/40 border border-gray-700/50 backdrop-blur-sm hover:border-indigo-500/30 transition-all">
                                    <div className="flex justify-between items-start mb-2">
                                        <div>
                                            <h3 className="font-bold text-xl text-gray-100">{exp.position}</h3>
                                            <p className="text-indigo-400 font-medium">{exp.company}</p>
                                        </div>
                                        {exp.attachment && (
                                            <a href={`/storage/${exp.attachment}`} target="_blank" rel="noreferrer" className="p-2 bg-gray-800 rounded-lg hover:bg-gray-700 text-gray-400 hover:text-white transition-colors" title="View Certificate/Document">
                                                <Download className="w-4 h-4" />
                                            </a>
                                        )}
                                    </div>
                                    <p className="text-sm text-gray-500 mb-4">
                                        {new Date(exp.start_date).toLocaleDateString('id-ID', { month: 'short', year: 'numeric' })} 
                                        {' - '} 
                                        {exp.is_current ? 'Present' : (exp.end_date ? new Date(exp.end_date).toLocaleDateString('id-ID', { month: 'short', year: 'numeric' }) : 'Unknown')}
                                    </p>
                                    {exp.description && (
                                        <p className="text-gray-400 whitespace-pre-line">{exp.description}</p>
                                    )}
                                </div>
                            </div>
                        )) : (
                            <p className="text-gray-500 italic">No experience added yet. Add some in the Admin panel.</p>
                        )}
                    </div>
                </motion.section>

                {/* Projects Gallery */}
                <motion.section 
                    id="projects"
                    initial={{ opacity: 0 }}
                    whileInView={{ opacity: 1 }}
                    viewport={{ once: true, margin: "-100px" }}
                    transition={{ duration: 0.6 }}
                >
                    <div className="flex items-center gap-4 mb-12">
                        <Code className="w-8 h-8 text-cyan-400" />
                        <h2 className="text-3xl font-bold">Featured Projects</h2>
                    </div>

                    <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                        {projects?.length > 0 ? projects.map((project, i) => (
                            <motion.div 
                                key={project.id}
                                whileHover={{ y: -10 }}
                                className={`group relative rounded-3xl overflow-hidden bg-gray-800/30 border ${project.is_featured ? 'border-cyan-500/50 shadow-[0_0_30px_rgba(6,182,212,0.1)]' : 'border-gray-700/50'} backdrop-blur-sm p-1`}
                            >
                                <div className="absolute inset-0 bg-gradient-to-br from-indigo-500/10 via-transparent to-cyan-500/10 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                                
                                <div className="relative p-6 sm:p-8 h-full flex flex-col bg-gray-900 rounded-[22px]">
                                    {project.is_featured && (
                                        <div className="absolute top-0 right-8 -translate-y-1/2 px-3 py-1 bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 text-xs font-semibold rounded-full">
                                            Featured
                                        </div>
                                    )}
                                    
                                    <h3 className="text-2xl font-bold mb-3">{project.title}</h3>
                                    
                                    <p className="text-gray-400 flex-1 mb-6">
                                        {project.description}
                                    </p>

                                    {/* Technologies */}
                                    {project.technologies && Array.isArray(project.technologies) && (
                                        <div className="flex flex-wrap gap-3 mb-8">
                                            {project.technologies.map((tech, idx) => (
                                                <div key={idx} className="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-800/80 border border-gray-700 text-sm text-gray-300" title={tech}>
                                                    {getTechIcon(tech)}
                                                    <span className="hidden sm:inline">{tech}</span>
                                                </div>
                                            ))}
                                        </div>
                                    )}

                                    <div className="flex gap-4 pt-4 border-t border-gray-800">
                                        {project.github_url && (
                                            <a href={project.github_url} target="_blank" rel="noreferrer" className="flex items-center gap-2 text-gray-400 hover:text-white transition-colors">
                                                <Github className="w-5 h-5" /> Source
                                            </a>
                                        )}
                                        {project.live_url && (
                                            <a href={project.live_url} target="_blank" rel="noreferrer" className="flex items-center gap-2 text-cyan-400 hover:text-cyan-300 transition-colors ml-auto">
                                                <Globe className="w-5 h-5" /> Live Demo
                                            </a>
                                        )}
                                    </div>
                                </div>
                            </motion.div>
                        )) : (
                            <p className="text-gray-500 italic col-span-2">No projects added yet. Add some in the Admin panel.</p>
                        )}
                    </div>
                </motion.section>
            </main>

            <footer className="py-8 text-center text-gray-500 border-t border-gray-800/50 bg-gray-950">
                <p>© {new Date().getFullYear()} {user?.name}. Built with Laravel, Inertia, and React.</p>
            </footer>
        </div>
    );
}
